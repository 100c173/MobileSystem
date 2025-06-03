<?php

namespace App\Services\Mobile;

use App\Models\User;
use App\Models\Mobile;


use App\Models\MobileImage;
use App\Traits\ManageFiles;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Mobile\MobileRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AddNewMobileNotification;
use App\Notifications\acceptedMobileNotification;
use App\Notifications\rejectedMobileNotification;

class MobileService
{
    use ManageFiles;

    public function index()
    {
        $mobiles = Mobile::with('primaryImage')->where('status', 'approved')->get();
        return $mobiles;
    }
    public function mobiles_under_review()
    {
        $mobiles = Mobile::with('primaryImage')->where('status', 'pending')->get();
        return $mobiles;
    }

    public function mobile_accept($id)
    {
        $mobile = Mobile::findOrfail($id);
        $mobile->status = 'approved';
        $mobile->save();

        $user = $mobile->user;
        Notification::send($user,new acceptedMobileNotification());
        return true;
    }

    public function mobile_reject($id)
    {
        $mobile = Mobile::findOrfail($id);
        $images = MobileImage::where('mobile_id', $mobile->id)->get();
        foreach ($images as $image) {
            $this->deleteFile($image->image_url);
        }
        $mobile->delete();
        $user = $mobile->user;
        Notification::send($user,new rejectedMobileNotification());
        return true;
    }

    public function destroy($id)
    {
        $mobile = Mobile::findOrfail($id);
        $images = MobileImage::where('mobile_id', $mobile->id)->get();
        foreach ($images as $image) {
            $this->deleteFile($image->image_url);
        }
        $mobile->delete();
        return true;
    }

    public function store(MobileRequest $request)
    {

        $user = Auth::user();
      
        $data = [
            'name'                 => $request->name,
            'operating_system_id' => $request->operating_system_id,
            'brand_id'                => $request->brand_id,
            'release_date'         => $request->release_date,
            'user_id'              => $user->id,
            'status'               => $user->hasRole('admin') ? 'approved' : 'pending',
        ];
       

     
        session(['mobile_step.base' => $data]);

        return $data;

    }

    public function update(MobileRequest $request, $id)
    {
        $mobile = Mobile::findOrFail($id);

        $mobile->name                 = $request->name;
        $mobile->operating_system_id = $request->operating_system_id;
        $mobile->brand_id             = $request->brand_id ;
        $mobile->release_date         = $request->release_date;
        $mobile->user_id              = Auth::id();

        $mobile->save();
        return $mobile;
    }
}
