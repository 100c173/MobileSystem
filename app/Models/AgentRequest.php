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
