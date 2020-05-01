<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'org', 'address', 'contact', 'fname', 'lname', 'service', 'tax'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function uploads()
    // {
    //     return $this->hasMany('App\Upload');
    // }

    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function pos()
    {
        return $this->hasMany('App\Po');
    }
}
