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
        return $this->hasMany(MobileImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(MobileImage::class)->where('is_primary', true);
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
        $description = $this->description;
        $specification = $this->specification;

        return  $description->performance_cpu . ' ' . $specification->connectivity;
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
