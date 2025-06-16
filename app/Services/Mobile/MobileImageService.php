<?php

namespace App\Services\Mobile;

use App\Models\Image;
use App\Models\Mobile;
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
        $mobile = Mobile::findOrfail($id);

        $images = $mobile->images ;

        return [
            'images' => $images,
            'mobile' => $mobile,
        ];
    }

    public function store(Request $request)
    {

        $filePath = $this->uploadFile($request->file('url'), 'uploads/images');
        $is_primary = $request->has('is_primary') ? 1 : 0;

        if ($is_primary) {
            $mainImage = Image::where('is_primary', 1)->first();
            $mainImage->is_primary = 0;
            $mainImage->save();
        }

        $mobile = Mobile::findOrFail($request->mobile_id);
    

        $mobile->images()->create([
            'url' => $filePath,
            'is_priamry' => $is_primary,
            'caption' => $request->caption,
        ]);
    

        return true;
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filePath = $image->image_url;
        $image->delete();
        $this->deleteFile($filePath);
        return true;
    }

    public function make_image_essential($id, $mobileId)
    {
        $mainImage = Image::where('is_primary', 1)->where('imageable_id', $mobileId)->first();
        if ($mainImage) {
            $mainImage->is_primary = 0;
            $mainImage->save();
        }
        $image = Image::findOrFail($id);
        $image->is_primary = 1;
        $image->save();
        return true;
    }

    public function make_image_unEssential($id)
    {
        $image = Image::findOrFail($id);
        $image->is_primary = 0;
        $image->save();
        return true;
    }
}
