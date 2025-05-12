<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobile;

class MobileSpecification extends Model
{
    use HasFactory;

    protected $table = "mobile_specification";

    protected $fillable = [
        'mobile_id',        
        'cpu',
        'ram',
        'storage',
        'camera',
        'screen',
        'battery',
        'connectivity',
        'security_features',
    ];

    public function mobile(){
        return $this->belongsTo(Mobile::class);
    }
    
}
