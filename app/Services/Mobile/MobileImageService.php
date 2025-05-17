<?php

namespace App\Services\Mobile;

use App\Models\Mobile;
use App\Models\MobileDescription;
use App\Models\MobileImage;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class MobileImageService
{
    
    use ManageFiles;
    /**
     * Display mobile description.
     */
    public function images($id)
    {
        $images = MobileImage::where('mobile_id',$id)->get();
        $mobile = Mobile::findOrfail($id);

        if (!$images) {
            throw new ModelNotFoundException("Mobile description not found");
        }

        return [
            'images' => $images,
            'mobile' => $mobile,
        ];
    }

    public function store(Request $request){
        $filePath = $this->uploadFile($request->file('image_url'), 'uploads/images');
        $is_primary = $request->has('is_primary')?1:0;
        if($is_primary){
            $mainImage = MobileImage::where('is_primary',1)->first();
            $mainImage->is_primary = 0;
            $mainImage->save();
        }
        $image = new MobileImage();
        $image->mobile_id  = $request->mobile_id;
        $image->image_url  =  $filePath;
        $image->is_primary = $is_primary;
        $image->caption    = $request->caption;
        $image->save();
        return true;

    }

    public function destroy($id){
        $image = MobileImage::findOrFail($id);
        $filePath = $image->image_url;
        $image->delete();
        $this->deleteFile($filePath);
        return true;
    }

    public function make_image_essential($id,$mobileId){
        $mainImage = MobileImage::where('is_primary',1)->where('mobile_id',$mobileId)->first();
        if($mainImage){
            $mainImage->is_primary = 0;
            $mainImage->save();
        }
        $image = MobileImage::findOrFail($id);
        $image->is_primary = 1;
        $image->save();
        return true;
    }

    public function make_image_unEssential($id){
        $image = MobileImage::findOrFail($id);
        $image->is_primary = 0;
        $image->save();
        return true;
    }


}
