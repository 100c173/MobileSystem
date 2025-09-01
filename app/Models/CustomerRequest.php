<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerRequest extends Model
{
    protected $fillable = [
        'user_id',
        'brand_id',
        'model',
        'ram',
        'storage',
        'operating_system_id',
        'condition',
        'status',
        'price',
        'descriptions',
    ];

    public function images()
    {
        return $this->hasMany(CustomerRequestImage::class);
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
}
