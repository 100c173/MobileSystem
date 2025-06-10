<?php

namespace App\Services\customer;

use App\Models\AgentMobileStock;
use App\Models\Mobile;

class HomeService
{
    public function getLatestDevices()
    {
        $newMobiles = Mobile::with('primaryImage')->where('release_date', '>=', '2000-12-31')->get();
        return $newMobiles;
    }

    public function getMobileDetails(int $id)
    {
        return  Mobile::findOrFail($id);
    }

    public function getAgentStock()
    {
        $agentStock = AgentMobileStock::with('agent','mobile')->get();
      
        return  $agentStock; 
    }
}
