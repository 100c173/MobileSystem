<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentRequest extends Model
{
    protected $fillable = [
        'user_id',
        'business_name',
        'commercial_number',
        'address',
        'latitude',
        'longitude',
        'notes',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
