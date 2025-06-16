<?php

namespace App\Services\customer;

use App\Models\AgentMobileStock;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Mobile;
use App\Models\OperatingSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeService
{
    // Get all latest mobile devices with their primary images
    public function getLatestDevices()
    {
        try {
            $number_of_product_in_cart = CartItem::count();
            $mobiles = Mobile::with('primaryImage')->paginate(10);
            $brands = Brand::all();
            $operatingSystems = OperatingSystem::all();
            return [$mobiles, $brands, $operatingSystems,$number_of_product_in_cart];
        } catch (\Exception $e) {
            Log::error('Error in getLatestDevices: ' . $e->getMessage());
            throw $e;
        }
    }

    // Get details of a specific mobile device by ID
    public function getMobileDetails(int $id)
    {
        try {
            return Mobile::findOrFail($id);
        } catch (\Exception $e) {
            Log::error("Error in getMobileDetails for ID $id: " . $e->getMessage());
            throw $e;
        }
    }

    //Filter Mobiles by Os Or Brand 
    public function getfilterMobile(Request $request)
    {
        $brand = $request->query('brand');
        $os = $request->query('os');

        $query = Mobile::with(['brand', 'operatingSystem','primaryImage'])->latest();

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

        return  $query->paginate(10);
    }

    // Get all agent stocks with related agent and mobile data
    public function getAgentStock()
    {
        try {
            $brands = Brand::all();
            return [AgentMobileStock::with(['agent', 'mobile'])->paginate(10),$brands];
        } catch (\Exception $e) {
            Log::error('Error in getAgentStock: ' . $e->getMessage());
            throw $e;
        }
    }
}
