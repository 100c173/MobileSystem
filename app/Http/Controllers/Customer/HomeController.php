<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgentProfile;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Mobile;
use App\Models\User;
use App\Services\customer\HomeService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Injecting HomeService via constructor
    protected $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    // Display the customer home page
    public function homePage()
    {
        $number_of_product_in_cart = CartItem::count(); //cach
        $countries = Country::all(); //cach 
        return view('customers.home', compact('number_of_product_in_cart', 'countries'));
    }

    // Display latest mobile devices
    public function latestDevices()
    {
        try {
            [$newMobiles, $brands, $oses, $number_of_product_in_cart] = $this->homeService->getLatestDevices();
            return view('customers.devices.latest_devices', compact('newMobiles', 'brands', 'oses', 'number_of_product_in_cart'));
        } catch (\Exception $e) {
            Log::error('Error fetching latest devices: ' . $e->getMessage());
            return back()->withErrors('Failed to load latest devices.');
        }
    }

    public function filterMobiles(Request $request)
    {
        $filteredMobiles = $this->homeService->getfilterMobile($request);
        return view('customers.partials.mobile_card', [
            'newMobiles' => $filteredMobiles
        ]);
    }

    public function filterAgentMobiles(Request $request)
    {
        $agentStock = $this->homeService->getFilterAgentMobiles($request);
        return view('customers.partials.agent_mobile_card', compact('agentStock'));
    }

    // Display detailed view of a single mobile device
    public function mobileDetails(string $id)
    {
        try {
            $number_of_product_in_cart = CartItem::count();
            $countries = Country::all(); //cach 
            $mobile = $this->homeService->getMobileDetails($id);
            return view('customers.devices.more_details', compact('mobile', 'number_of_product_in_cart', 'countries'));
        } catch (\Exception $e) {
            Log::error("Error fetching mobile details for ID $id: " . $e->getMessage());
            return back()->withErrors('Failed to load mobile details.');
        }
    }

    // Display agent's available stock of devices
    public function agentStock()
    {
        try {
            $number_of_product_in_cart = CartItem::count();
            [$agentStock, $brands] = $this->homeService->getAgentStock();
            return view('customers.devices.agent_stocks', compact('agentStock', 'number_of_product_in_cart', 'brands'));
        } catch (\Exception $e) {
            Log::error('Error fetching agent stock: ' . $e->getMessage());
            return back()->withErrors('Failed to load agent stock.');
        }
    }
    /**
     * Search for agents based on criteria
     */
    public function searchAgents(Request $request)
    {
        $request->validate([
            'mobile_id' => 'required|exists:mobiles,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric|min:1', // بالكيلومتر
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
                    ->select('user_id', 'mobile_id', 'quantity','price'); // تأكد من جلب حقل الكمية
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

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        return $dist * 60 * 1.853159616; // النتيجة بالكيلومتر
    }
}
