<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity', 'agent_id'];

    // العلاقة مع المنتج (AgentMobileStock) - صحيح
    public function product()
    {
        return $this->belongsTo(AgentMobileStock::class, 'product_id');
    }

    // العلاقة مع المستخدم (Customer)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // العلاقة مع الوكيل (Agent)
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    // لا حاجة لها لأن "product()" تغطي نفس العلاقة
    // public function agentMobileStock(){
    //     return $this->belongsTo(AgentMobileStock::class);
    // }
}
