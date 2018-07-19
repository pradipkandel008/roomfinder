<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookroom extends Model
{
    protected $table='bookrooms';

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
        'booked_by',
        'room_id',
        'status',
    ];
}
