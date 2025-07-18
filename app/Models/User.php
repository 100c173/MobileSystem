<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\AgentRequest;
use App\Models\Mobile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */

    use HasFactory, Notifiable, HasApiTokens, SoftDeletes, HasRoles;
    /*
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'stripe_account_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profileImage()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function isPrimary()
    {
        return $this->morphOne(Image::class, 'imageable')->where('is_primary', true);
    }

    public function agentRequest()
    {
        return $this->hasOne(AgentRequest::class);
    }

    public function products()
    {
        return $this->belongsToMany(Mobile::class, 'agent_mobile_stocks');
    }


    public function isBanned(): bool
    {
        return $this->permanently_banned || ($this->banned_until && now()->lessThan($this->banned_until));
    }



    public function unban()
    {
        $this->banned_until = null;
        $this->permanently_banned = false;
        $this->save();
    }

    public function remainingBanHours(): ?int
    {
        return $this->banned_until ? now()->diffInHours($this->banned_until, false) : null;
    }

    public function mobiles()
    {
        return $this->hasMany(Mobile::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function agentMobileStock()
    {
        return $this->hasMany(AgentMobileStock::class, 'user_id');
    }

    public function agentProfile()
    {
        return $this->hasOne(AgentProfile::class, 'agent_id');
    }
}
