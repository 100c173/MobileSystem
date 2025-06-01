<?php

namespace App\Services\Mobile;

use App\Http\Requests\Mobile\MobileDescriptionRequest;
use App\Models\Mobile;
use App\Models\MobileDescription;
use App\Models\MobileSpecification;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\AddNewMobileNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MobileDescriptionService
{
    /**
     * Display mobile description.
     */
    public function description($id)
    {
        $description = MobileDescription::where('mobile_id', $id)->first();
        $mobile = Mobile::findOrfail($id);

        if (!$description) {
            throw new ModelNotFoundException("Mobile description not found");
        }

        return [
            'description' => $description,
            'mobile' => $mobile,
        ];
    }

    public function add_description($id)
    {
        $mobile = Mobile::findOrfail($id);

        if (!$mobile) {
            throw new ModelNotFoundException("Mobile description not found");
        }

        return $mobile;
    }

    public function create_description($id)
    {
        $mobile = Mobile::findOrfail($id);
        return $mobile;
    }


    public function store(MobileDescriptionRequest $request)
    {
        $data = [
            'design_dimensions' => $request->design_dimensions,
            'display'           => $request->display,
            'performance_cpu'   => $request->performance_cpu,
            'storage_desc'      => $request->storage_desc,
            'connectivity_desc' => $request->connectivity_desc,
            'battery_desc'      => $request->battery_desc,
            'extra_features'    => $request->extra_features,
            'security_privacy'  => $request->security_privacy,
            'pros'              => $request->pros,
            'cons'              => $request->cons,
        ];

        session(['mobile_step.description' => $data]);

       
        DB::transaction(function () {
            $base = session('mobile_step.base');
            $spec = session('mobile_step.specification');
            $desc = session('mobile_step.description');

            
            $mobile = Mobile::create($base);

          
            $spec['mobile_id'] = $mobile->id;
            MobileSpecification::create($spec);

            $desc['mobile_id'] = $mobile->id;
            MobileDescription::create($desc);

        
            if (!User::findOrFail($base['user_id'])->hasRole('admin')) {
                $admins = User::role('admin')->get();
                Notification::send($admins, new AddNewMobileNotification(Auth::user()));
            }

            session()->forget([
                'mobile_step.base',
                'mobile_step.specification',
                'mobile_step.description'
            ]);
        });
    }
    public function update(MobileDescriptionRequest $request, $id)
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
