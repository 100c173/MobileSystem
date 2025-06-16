<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Mobile;
use App\Services\customer\HomeService;
use Illuminate\Support\Facades\Log;

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
        $number_of_product_in_cart = CartItem::count();
        return view('customers.home',compact('number_of_product_in_cart'));
    }

    // Display latest mobile devices
    public function latestDevices()
    {
        try {
            [$newMobiles, $brands, $oses,$number_of_product_in_cart] = $this->homeService->getLatestDevices();
            return view('customers.devices.latest_devices', compact('newMobiles', 'brands', 'oses','number_of_product_in_cart'));
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


    // Display detailed view of a single mobile device
    public function mobileDetails(string $id)
    {
        try {
            $number_of_product_in_cart = CartItem::count();
            $mobile = $this->homeService->getMobileDetails($id);
            return view('customers.devices.more_details', compact('mobile','number_of_product_in_cart'));
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
            [$agentStock,$brands] = $this->homeService->getAgentStock();
            return view('customers.devices.agent_stocks', compact('agentStock','number_of_product_in_cart','brands'));
        } catch (\Exception $e) {
            Log::error('Error fetching agent stock: ' . $e->getMessage());
            return back()->withErrors('Failed to load agent stock.');
        }
    }
}
