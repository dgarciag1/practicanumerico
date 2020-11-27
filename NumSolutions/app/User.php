<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Routineuser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','credit',
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

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function getCredit()
    {
        return $this->attributes['credit'];
    }

    public function setCredit($credit)
    {
        $this->attributes['credit'] = $credit;
    }

    public function sales(){
        $this->hasMany(Sales::class);
    }

    public function routineusers(){
        return $this->hasMany(Routineuser::class);
    }
}
