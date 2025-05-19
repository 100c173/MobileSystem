<?php

namespace App\Services\Mobile;

use App\Http\Requests\Mobile\MobileRequest;
use App\Models\Mobile;


use App\Models\MobileImage;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;


class MobileService
{
    use ManageFiles;

    public function index()
    {
        $mobiles = Mobile::with('primaryImage')->get();
        return $mobiles;
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
        $mobile->brand             = $request->brand;
        $mobile->release_date   = $request->release_date;
            
        $mobile->save();
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
