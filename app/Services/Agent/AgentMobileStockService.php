<?php

namespace App\Services\Agent;

use App\Models\AgentMobileStock;
use Illuminate\Support\Facades\Auth;

class AgentMobileStockService
{

    public function getAllMyProducts(){
        $aget = Auth::user();
        return $aget->products ;
    }
    public function saveInMyProducts($data){

        AgentMobileStock::create([
            'user_id'   => Auth::user()->id,
            'mobile_id' => $data['mobile_id'] , 
            'price'     => $data['price'] , 
            'quantity'  => $data['quantity'],
        ]);

    }
}
