<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const STATUS_PUBLIC=1;
    const STATUS_PRIVATE=0;

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-default'
        ]
    ];



    const HOT=1;
    const NO_HOT=0;

    protected $vip = [
        1 => [
            'name' => 'Admin',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'User',
            'class' => 'label-primary'
        ]
    ];
    public function getHot() 
    {
        return array_get($this->vip,$this->hot,'[N\A]');
    }
    

    public function getStatus()
    {
        return array_get($this->status,$this->active, '[N\A]'); 
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $guarded = [''];
    protected $filltable = ['id','name','email','password','phone','level','address'];

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

    
}


