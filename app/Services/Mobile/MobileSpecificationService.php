<?php

namespace App\Services\Mobile;

use App\Models\Mobile;
use App\Models\MobileSpecification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MobileSpecificationService
{
    /**
     * Display mobile specification.
     */
    public function specification($id)
    {
        $specification = MobileSpecification::where('mobile_id',$id)->first();
        $mobile = Mobile::findOrfail($id);

        if (!$specification) {
            throw new ModelNotFoundException("Mobile specification not found");
        }

        return [
            'specification' => $specification,
            'mobile' => $mobile,
        ];
    }

    public function addSpecification($id)
    {
        $mobile = Mobile::findOrfail($id);

        if (!$mobile) {
            throw new ModelNotFoundException("Mobile description not found");
        }

        return $mobile;
    }

    public function createSpecification($id)
    {
        $mobile = Mobile::findOrfail($id);
        return $mobile;
    }

    public function store(Request $request)
    {
        $mobileSpecification = new MobileSpecification();
    
        $mobileSpecification->mobile_id             =   $request->mobile_id;
        $mobileSpecification->cpu                   =   $request->cpu;
        $mobileSpecification->ram                   =   $request->ram;
        $mobileSpecification->storage               =   $request->storage;
        $mobileSpecification->camera                =   $request->camera;
        $mobileSpecification->screen                =   $request->screen;
        $mobileSpecification->battery               =   $request->battery;
        $mobileSpecification->connectivity          =   $request->connectivity;
        $mobileSpecification->security_features     =   $request->security_features;
            
        $mobileSpecification->save();
        return $mobileSpecification;

    }
    public function update(Request $request,$id)
    {
        $mobileSpecification = MobileSpecification::findorfail($id);
    
        $mobileSpecification->mobile_id             =   $request->mobile_id;
        $mobileSpecification->cpu                   =   $request->cpu;
        $mobileSpecification->ram                   =   $request->ram;
        $mobileSpecification->storage               =   $request->storage;
        $mobileSpecification->camera                =   $request->camera;
        $mobileSpecification->screen                =   $request->screen;
        $mobileSpecification->battery               =   $request->battery;
        $mobileSpecification->connectivity          =   $request->connectivity;
        $mobileSpecification->security_features     =   $request->security_features;
            
        $mobileSpecification->save();
        return $mobileSpecification;

    }


}
