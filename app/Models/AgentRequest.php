<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentRequest extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'business_name',
        'commercial_number',
        'country_id',
        'city_id',
        'address',
        'latitude',
        'longitude',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
