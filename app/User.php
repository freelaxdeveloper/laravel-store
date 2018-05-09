<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Chat;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
