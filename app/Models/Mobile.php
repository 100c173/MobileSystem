<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{

    protected $fillable = ['name', 'brand_id', 'operating_system_id', 'status', 'user_id' ,'release_date'];


    public function specification(){
        return $this->hasOne(MobileSpecification::class);
    }

    public function description(){
        return $this->hasOne(MobileDescription::class);
    }
    public function images(){
        return $this->hasMany(MobileImage::class);
    }

    public function primaryImage(){
        return $this->hasOne(MobileImage::class)->where('is_primary',true);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
     public function operatingSystem(){
        return $this->belongsTo(OperatingSystem::class);
    }



}
