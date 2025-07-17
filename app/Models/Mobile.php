<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{

    protected $fillable = ['name', 'brand_id', 'operating_system_id', 'status', 'user_id', 'release_date'];


    public function specification()
    {
        return $this->hasOne(MobileSpecification::class);
    }

    public function description()
    {
        return $this->hasOne(MobileDescription::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    public function primaryImage()
    {
        return $this->morphOne(Image::class,'imageable')->where('is_primary', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }

    public function getFastReviewAttribute()
    {
        $specification = $this->specification;

        return   $specification?->ram .  "<br>"   . $specification->cpu ; 
    }

    public function getDateFormattedAttribute()
    {
        return Carbon::parse($this->release_date)->format('F j, Y');
    }

    public function agentMobileStock()
    {
        return $this->hasMany(AgentMobileStock::class);
    }


}
