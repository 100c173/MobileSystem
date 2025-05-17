<?php

namespace App\Services\Mobile;

use App\Http\Requests\Mobile\MobileDescriptionRequest;
use App\Models\Mobile;
use App\Models\MobileDescription;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MobileDescriptionService
{
    /**
     * Display mobile description.
     */
    public function description($id)
    {
        $description = MobileDescription::where('mobile_id',$id)->first();
        $mobile = Mobile::findOrfail($id);

        if (!$description) {
            throw new ModelNotFoundException("Mobile description not found");
        }

        return [
            'description' => $description,
            'mobile' => $mobile,
        ];
    }

    public function store(MobileDescriptionRequest $request)
    {
        $mobileDescription = new MobileDescription();
    
        $mobileDescription->mobile_id               =   $request->mobile_id;
        $mobileDescription->design_dimensions       =   $request->design_dimensions;
        $mobileDescription->display                 =   $request->display;
        $mobileDescription->performance_cpu         =   $request->performance_cpu;
        $mobileDescription->storage_desc            =   $request->storage_desc;
        $mobileDescription->connectivity_desc       =   $request->connectivity_desc;
        $mobileDescription->battery_desc            =   $request->battery_desc;
        $mobileDescription->extra_features          =   $request->extra_features;
        $mobileDescription->security_privacy        =   $request->security_privacy;
        $mobileDescription->pros                    =   $request->pros;
        $mobileDescription->cons                    =   $request->cons;
            
        $mobileDescription->save();
        return $mobileDescription;

    }
    public function update(MobileDescriptionRequest $request,$id)
    {
        $mobileDescription = MobileDescription::findOrFail($id);
    
        $mobileDescription->mobile_id               =   $request->mobile_id;
        $mobileDescription->design_dimensions       =   $request->design_dimensions;
        $mobileDescription->display                 =   $request->display;
        $mobileDescription->performance_cpu         =   $request->performance_cpu;
        $mobileDescription->storage_desc            =   $request->storage_desc;
        $mobileDescription->connectivity_desc       =   $request->connectivity_desc;
        $mobileDescription->battery_desc            =   $request->battery_desc;
        $mobileDescription->extra_features          =   $request->extra_features;
        $mobileDescription->security_privacy        =   $request->security_privacy;
        $mobileDescription->pros                    =   $request->pros;
        $mobileDescription->cons                    =   $request->cons;
            
        $mobileDescription->save();
        return $mobileDescription;

    }


}
