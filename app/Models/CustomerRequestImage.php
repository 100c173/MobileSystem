<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerRequestImage extends Model
{
    protected $fillable = [
        'customer_request_id',
        'path',
        'is_primary',
    ];

    public function customerRequest()
    {
        return $this->belongsTo(CustomerRequest::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}
