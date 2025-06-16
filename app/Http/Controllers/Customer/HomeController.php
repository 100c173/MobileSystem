<?php

namespace App\Http\Controllers\Customer;

use App\Models\Mobile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\customer\HomeService;

class HomeController extends Controller
{
    protected $homeService ; 

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function  homePage()  {

        return view('customers.home');
    }


    public function latestDevices()
    {
        $newMobiles = $this->homeService->getLatestDevices();
        return view('customers.devices.latest_devices',compact('newMobiles'));
    }

    public function mobileDetails(string $id) 
    {
        $mobile = $this->homeService->getMobileDetails($id);
        return view('customers.devices.more_details',compact('mobile'));
    }

    public function agentStock()
    {
        $agentStock = $this->homeService->getAgentStock();
        return view('customers.devices.agent_stocks',compact('agentStock'));
    }

}
