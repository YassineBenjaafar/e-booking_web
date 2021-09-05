<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'fullName', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();;
    }
    public function hasRoles($roles)
    {
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name',$role)->first();
    }
   
}