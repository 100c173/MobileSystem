<?php

namespace App\Services;

use App\Models\Mobile;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MobileService
{

    public function index()
    {
        $mobiles = Mobile::with('primaryImage')->get();
        return $mobiles;
    }

}
