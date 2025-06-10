<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentMobileStock extends Model
{
    protected $fillable = ['user_id' ,'mobile_id','price' , 'quantity'  , 'created_at' , 'updated_at'];

    public function agent(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function mobile(){
        return $this->belongsTo(Mobile::class);
    }
}
