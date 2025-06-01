<?php

namespace App\Services\Os;

use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;

class OperatingSystemService
{
    use ManageFiles;

    public function index()
    {
        $oss = OperatingSystem::get();
        return $oss;
    }

    public function destroy($id)
    {
        $os = OperatingSystem::findOrfail($id);
        $os->delete();
        return true;
    }

    public function store(Request $request)
    {
        $os = new OperatingSystem();

        $os->name = $request->name;

        $os->save();
        return $os;
    }

    public function update(Request $request,$id)
    {
        $os = OperatingSystem::findOrFail($id);

        $os->name                = $request->name;

        $os->save();
        return $os;
    }

     public function mobilesByOs($id)
    {
         $os   = OperatingSystem::findOrFail($id);
         $mobiles = $os->mobiles;
         return $mobiles;

    }

}
