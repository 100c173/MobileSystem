<?php

namespace App\Services\Agent;

use App\Models\AgentMobileStock;

class AgentMobileStockService
{
    public function saveInMyProducts($request){

        $product = AgentMobileStock::create([
            'user-id'   => auth()->user()->id,
            'mobile_id' => $request->mobile_id , 
            'price'     => $request->price , 
            'quantity'  => $request->quantity,
        ]);
        
        return $product ; 

    }
}
