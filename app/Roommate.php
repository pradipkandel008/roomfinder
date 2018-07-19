<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Roommate extends Model
{
    use Notifiable;
    protected $table='roommates';

    protected $fillable = [
        'location',
        'first_name', 
        'last_name',
        'gender',
        'dob',
        'occupation',
        'marital_status',
        'no_of_rooms',
        'water_facility',
        'parking',
        'image',
        'email',
        'phone',
        'added_by',
        'status',
        'availability',
    ];
}
