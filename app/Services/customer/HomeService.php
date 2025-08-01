<?php

namespace App\Services\customer;

use App\Http\Requests\Customer\CustomerRequest as CustomerCustomerRequest;
use App\Models\AgentMobileStock;
use App\Models\AgentProfile;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\CustomerRequest;
use App\Models\CustomerRequestImage;
use App\Models\Mobile;
use App\Models\OperatingSystem;
use App\Models\User;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeService
{
    use ManageFiles;

    /**
     * Get latest mobile devices with their primary images
     * Also returns brands, operating systems, and cart item count for authenticated user
     * 
     * @return array [mobiles, brands, operatingSystems, cartCount]
     * @throws \Exception
     */
    public function getLatestDevices()
    {
        try {
            $cartCount = 0;
            if (Auth::user()) {
                $cartCount = CartItem::where('user_id', Auth::user()->id)->count();
            }

            $mobiles = Mobile::with('primaryImage')->paginate(10);
            $brands = Brand::all();
            $operatingSystems = OperatingSystem::all();

            return [$mobiles, $brands, $operatingSystems, $cartCount];
        } catch (\Exception $e) {
            Log::error('Error in getLatestDevices: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get detailed information for a specific mobile device
     * 
     * @param int $id Mobile device ID
     * @return Mobile
     * @throws \Exception
     */
    public function getMobileDetails(int $id)
    {
        try {
            return Mobile::findOrFail($id);
        } catch (\Exception $e) {
            Log::error("Error in getMobileDetails for ID $id: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Filter mobile devices by brand and/or operating system
     * 
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getfilterMobile(Request $request)
    {
        $brand = $request->query('brand');
        $os = $request->query('os');

        $query = Mobile::with(['brand', 'operatingSystem', 'primaryImage'])
            ->latest();

        if (!empty($brand)) {
            $query->whereHas('brand', function ($q) use ($brand) {
                $q->where('id', $brand);
            });
        }

        if (!empty($os)) {
            $query->whereHas('operatingSystem', function ($q) use ($os) {
                $q->where('id', $os);
            });
        }

        return $query->paginate(10);
    }

    /**
     * Filter agent mobile stocks by brand and price range
     * 
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getFilterAgentMobiles(Request $request)
    {
        $brand = $request->query('brand');
        $price = $request->query('price');

        $query = AgentMobileStock::with(['mobile.primaryImage', 'agent'])
            ->latest();

        if (!empty($brand)) {
            $query->whereHas('mobile', function ($q) use ($brand) {
                $q->where('brand_id', $brand);
            });
        }

        if (!empty($price)) {
            switch ($price) {
                case '<200':
                    $query->where('price', '<', 200);
                    break;
                case '>=200<=500':
                    $query->whereBetween('price', [200, 500]);
                    break;
                case '>=500<=800':
                    $query->whereBetween('price', [500, 800]);
                    break;
                case '>800':
                    $query->where('price', '>', 800);
                    break;
            }
        }

        return $query->paginate(10);
    }

    /**
     * Get agent profile and their mobile stock
     * 
     * @param int $id Agent ID
     * @return array [agentProfile, agentDevices]
     */
    public function getAgentGallery(int $id)
    {
        $agentProfile = AgentProfile::where('agent_id', $id)->first();
        $agentDevices = $agentProfile->agent->agentMobileStock()->paginate(10);

        return [$agentProfile, $agentDevices];
    }

    /**
     * Store a new customer request with images
     * 
     * @param CustomerCustomerRequest $request
     * @return void
     */
    public function storeCustomerRequest(CustomerCustomerRequest $request)
    {
        $customerRequest = CustomerRequest::create([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'operating_system_id' => $request->operating_system_id,
            'price' => $request->price,
            'condition' => $request->condition,
        ]);

        $filePath = $this->uploadFile($request->file('images'), 'uploads/customer_request');

        CustomerRequestImage::create([
            'customer_request_id' => $customerRequest->id,
            'path' => $filePath,
            'is_primary' => true,
        ]);
    }

    /**
     * Search for agents within a specific radius that have a particular mobile in stock
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchAgents(Request $request)
    {
        $request->validate([
            'mobile_id' => 'required|exists:mobiles,id',
            'latitude'  => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius'    => 'required|numeric|min:1', // in kilometers
        ]);

        $agents = User::whereHas('agentProfile', function ($q) use ($request) {
            $q->whereExists(function ($query) use ($request) {
                $query->select(DB::raw(1))
                    ->from('agent_profiles')
                    ->whereRaw('users.id = agent_profiles.agent_id')
                    ->whereRaw("
                            6371 * acos(
                                cos(radians(?)) *
                                cos(radians(latitude)) *
                                cos(radians(longitude) - radians(?)) +
                                sin(radians(?)) *
                                sin(radians(latitude))
                            ) <= ?
                        ", [
                        $request->latitude,
                        $request->longitude,
                        $request->latitude,
                        $request->radius
                    ]);
            });
        })
            ->whereHas('agentMobileStock', function ($q) use ($request) {
                $q->where('mobile_id', $request->mobile_id)
                    ->where('quantity', '>', 0);
            })
            ->with(['agentProfile', 'agentMobileStock' => function ($q) use ($request) {
                $q->where('mobile_id', $request->mobile_id)
                    ->select('user_id', 'mobile_id', 'quantity', 'price');
            }])
            ->get()
            ->map(function ($user) use ($request) {
                if ($user->agentProfile) {
                    $user->distance = $this->calculateDistance(
                        $request->latitude,
                        $request->longitude,
                        $user->agentProfile->latitude,
                        $user->agentProfile->longitude
                    );
                }
                $user->quantity = $user->agentMobileStock->first()->quantity ?? 0;
                $user->price = $user->agentMobileStock->first()->price ?? 0;
                return $user;
            });

        return response()->json([
            'success' => true,
            'agents' => $agents
        ]);
    }

    public function getCustomerDevices(){
        $devices = CustomerRequest::with(['images','user','brand','operatingSystem'])->get();
        return $devices ; 
    }

    /**
     * Calculate distance between two coordinates using Haversine formula
     * 
     * @param float $lat1 Latitude of point 1
     * @param float $lon1 Longitude of point 1
     * @param float $lat2 Latitude of point 2
     * @param float $lon2 Longitude of point 2
     * @return float Distance in kilometers
     */
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        return $dist * 60 * 1.853159616; // Result in kilometers
    }


}
