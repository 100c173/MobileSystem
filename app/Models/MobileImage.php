<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mobile;

class MobileImage extends Model
{
    
    protected $fillable = [
        'mobile_id',
        'image_url',
        'is_primary',
        'caption',
    ];

    public function mobile(){
        return $this->belongsTo(Mobile::class);
    }
}
