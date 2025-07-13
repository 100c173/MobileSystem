<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentProfile extends Model
{
    protected $fillable = ['agent_id', 'latitude', 'longitude', 'phone', 'address'];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function stocks()
    {
        return $this->hasMany(AgentMobileStock::class, 'user_id');
    }
}
