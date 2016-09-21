<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const PRIMARY_ADMIN_ID = 1;
    const TYPE_NORMAL = 1;
    const TYPE_ADMIN  = 2;

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

    public function polls()
    {
        return $this->hasMany('App\Poll');
    }

    public function getIsAdminAttribute()
    {
        return $this->id == User::PRIMARY_ADMIN_ID || $this->type == User::TYPE_ADMIN;
    }  
}
