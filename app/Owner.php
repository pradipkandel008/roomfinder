<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\OwnerResetPasswordNotification;

class Owner extends Authenticatable
{
    use Notifiable;

    protected $guard='owner';

    protected $table='owners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','gender','email', 'phone','image','user_name','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token){
        $this->notify(new OwnerResetPasswordNotification($token));
    }
}
