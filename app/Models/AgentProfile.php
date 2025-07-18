<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentProfile extends Model
{
    protected $fillable = ['agent_id', 'country_id' , 'city_id' , 'business_name' ,'description','latitude', 'longitude', 'phone', 'address'];

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function city(){
        return $this->belongsTo(City::class) ; 
    }

    public function country (){
        return $this->belongsTo(Country::class) ; 
    }

}
