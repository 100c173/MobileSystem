<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ManageFiles{
    public function uploadFile($file,$directory){
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $originalName . '_' . time() . '.' . $file->extension();
        $filePath = $file->move($directory, $fileName);
        return $filePath;
    }

    public function deleteFile($filePath)
    {
        $file = public_path($filePath);
        $result = File::delete($file);
        return $result;
    }

}

#  Using the Trait in a Controller:
#  use App\Traits\ManageFiles;
#  use ManageFiles;
#  $filePath = $this->uploadFile($request->file('the_name'), 'uploads/profile_pictures');
#  $result = $this->deleteFile($filePath);