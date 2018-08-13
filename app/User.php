<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\{Chat, Product, Order};

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getAvatarAttribute()
    {
        return '/images/avatar.png';
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function chatMessages()
    {
        return $this->hasMany(Chat::class);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }
    /**
     * Undocumented function
     *
     * @param [type] $roles
     * @return bool
     */
    public function hasAnyRole(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
        return false;
    }
    /**
     * Undocumented function
     *
     * @param [type] $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        if ($this->roles()->where('name', '=', $role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
