<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model
{
    public function mobiles(){
        return $this->hasMany(Mobile::class);
    }
}
