<?php

namespace App\Services\Mobile;

use App\Models\User;
use App\Models\Mobile;


use App\Models\MobileImage;
use App\Traits\ManageFiles;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Mobile\MobileRequest;
use App\Notifications\AddNewMobileNotification;
use Illuminate\Support\Facades\Notification;

class MobileService
{
    use ManageFiles;

    public function index()
    {
        $mobiles = Mobile::with('primaryImage')->where('status','approved')->get();
        return $mobiles;
    }
    public function mobiles_under_review()
    {
        $mobiles = Mobile::with('primaryImage')->where('status','pending')->get();
        return $mobiles;
    }

    public function mobile_accept($id)
    {
        $mobile = Mobile::findOrfail($id);
        $mobile->status = 'approved';
        $mobile->save();
        return true;
    }

    public function mobile_reject($id)
    {
        $mobile = Mobile::findOrfail($id);
        $images = MobileImage::where('mobile_id',$mobile->id)->get();
        foreach($images as $image){
            $this->deleteFile($image->image_url);
        }
        $mobile->delete();
        return true;
    }

    public function destroy($id)
    {
        $mobile = Mobile::findOrfail($id);
        $images = MobileImage::where('mobile_id',$mobile->id)->get();
        foreach($images as $image){
            $this->deleteFile($image->image_url);
        }
        $mobile->delete();
        return true;
    }

    public function store(MobileRequest $request)
    {
        $mobile = new Mobile();

        $mobile->name           = $request->name;
        $mobile->os             = $request->os;
        $mobile->brand          = $request->brand;
        $mobile->release_date   = $request->release_date;
        $mobile->user_id        = Auth::id();
        if(auth()->user()->hasRole('admin')){
            $mobile->status        = 'approved';
        }else{
            $mobile->status        = 'pending';
        }
        $mobile->save();

        $user = User::findOrFail($request->user()->id);

         if (!$user->hasRole('admin')) {
            $admins = User::role('admin')->get();
            Notification::send($admins,new AddNewMobileNotification($user));
        }
        return $mobile;
    }

    public function update(MobileRequest $request,$id)
    {
        $mobile = Mobile::findOrFail($id);

        $mobile->name           = $request->name;
        $mobile->os             = $request->os;
        $mobile->brand          = $request->brand;
        $mobile->release_date   = $request->release_date;

        $mobile->save();
        return $mobile;
    }

}
