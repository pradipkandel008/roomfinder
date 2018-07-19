<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Acceptrequest extends Model
{
    use Notifiable;
    protected $table='acceptrequests';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'dob',
        'occupation',
        'marital_status',
        'image',
        'email',
        'phone',
        'accepted_by',
        'roommate_id',
        'status',
    ];
}
