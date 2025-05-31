<?php

namespace App\Services\Brand;

use App\Models\Brand;
use App\Models\Mobile;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;

class BrandService
{
    use ManageFiles;

    public function index()
    {
        $brands = Brand::get();
        return $brands;
    }

    public function destroy($id)
    {
        $brand = Brand::findOrfail($id);
        $brand->delete();
        return true;
    }

    public function store(Request $request)
    {
        $brand = new Brand();

        $brand->name = $request->name;

        $brand->save();
        return $brand;
    }

    public function update(Request $request,$id)
    {
        $brand = Brand::findOrFail($id);

        $brand->name                = $request->name;

        $brand->save();
        return $brand;
    }

     public function mobilesByBrand($id)
    {
         $brand   = Brand::findOrFail($id);
         $mobiles = $brand->mobiles;
         return $mobiles;

    }

}
