<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard='web';

    protected $table='users';

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
        $this->notify(new UserResetPasswordNotification($token));
    }
}
