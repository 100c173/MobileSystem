<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\OperatingSystem;
use App\Services\customer\HomeService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * The HomeService instance for business logic
     * 
     * @var HomeService
     */
    protected $homeService;

    /**
     * Constructor to inject HomeService dependency
     * 
     * @param HomeService $homeService
     */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    /**
     * Display the customer home page with cart count and dropdown options
     * 
     * @return \Illuminate\View\View
     */
    public function homePage()
    {
        $number_of_product_in_cart = 0;
        if (Auth::user()) {
            $number_of_product_in_cart = CartItem::where('user_id', Auth::user()->id)->count(); // cached
        }
        
        $operating_systems = OperatingSystem::all();
        $brands = Brand::all();
        $countries = Country::all(); // cached
        
        return view('customers.home', compact(
            'number_of_product_in_cart', 
            'countries', 
            'brands', 
            'operating_systems'
        ));
    }

    /**
     * Display the latest mobile devices page
     * 
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function latestDevices()
    {
        try {
            [$newMobiles, $brands, $oses, $number_of_product_in_cart] = $this->homeService->getLatestDevices();
            return view('customers.devices.latest_devices', compact(
                'newMobiles', 
                'brands', 
                'oses', 
                'number_of_product_in_cart'
            ));
        } catch (\Exception $e) {
            Log::error('Error fetching latest devices: ' . $e->getMessage());
            return back()->withErrors('Failed to load latest devices.');
        }
    }

    /**
     * Filter and return mobile devices based on request parameters
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function filterMobiles(Request $request)
    {
        $filteredMobiles = $this->homeService->getfilterMobile($request);
        return view('customers.partials.mobile_card', [
            'newMobiles' => $filteredMobiles
        ]);
    }

    /**
     * Filter and return agent mobile stocks based on request parameters
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function filterAgentMobiles(Request $request)
    {
        $agentStock = $this->homeService->getFilterAgentMobiles($request);
        return view('customers.partials.agent_mobile_card', compact('agentStock'));
    }

    /**
     * Display detailed view for a specific mobile device
     * 
     * @param string $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function mobileDetails(string $id)
    {
        try {
            $number_of_product_in_cart = 0;
            if (Auth::user()) {
                $number_of_product_in_cart = CartItem::where('user_id', Auth::user()->id)->count();
            }
            
            $countries = Country::all(); // cached
            $mobile = $this->homeService->getMobileDetails($id);
            
            return view('customers.devices.more_details', compact(
                'mobile', 
                'number_of_product_in_cart', 
                'countries'
            ));
        } catch (\Exception $e) {
            Log::error("Error fetching mobile details for ID $id: " . $e->getMessage());
            return back()->withErrors('Failed to load mobile details.');
        }
    }

    /**
     * Display the agent's gallery page with their mobile stock
     * 
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function agentGallery(int $id)
    {
        try {
            $number_of_product_in_cart = CartItem::where('user_id', Auth::user()->id)->count();
            [$agent_profile, $agentDevices] = $this->homeService->getAgentGallery($id);
            
            return view('customers.agent.agent_gallery', compact(
                'number_of_product_in_cart', 
                'agent_profile', 
                'agentDevices'
            ));
        } catch (Exception $e) {
            Log::error('Error fetching agent stock: ' . $e->getMessage());
            return back()->withErrors('Failed to load agent profile.');
        }
    }

    /**
     * Search for agents based on geographic criteria
     * 
     * @param Request $request
     * @return mixed
     */
    public function searchAgents(Request $request)
    {
        $agent = $this->homeService->searchAgents($request);
        return $agent;
    }

    /**
     * Handle submission of customer device requests
     * 
     * @param CustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customerRequest(CustomerRequest $request)
    {
        try {
            $this->homeService->storeCustomerRequest($request);
            return back()->with(
                'success', 
                'Your request has been submitted successfully. ' .
                'Your device data will be verified and then we will inform you ' .
                'if it has been published in the market.'
            );
        } catch (Exception $e) {
            Log::error('Error create customer request : ' . $e->getMessage());
            return back()->withErrors($e->getMessage());
        }
    }
}