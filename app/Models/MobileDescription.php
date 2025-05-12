<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mobile;

class MobileDescription extends Model
{
    protected $fillable = [
        'mobile_id',              
        'design_dimensions',
        'display',
        'performance_cpu',
        'storage_desc',
        'connectivity_desc',
        'battery_desc',
        'extra_features',
        'security_privacy',
        'pros',
        'cons',
    ];
    public function mobile(){
        return $this->belongsTo(Mobile::class);
    }    
}
