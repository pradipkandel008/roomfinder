<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    use Notifiable;
 	protected $table='rooms';

    protected $fillable = [
        'owner_first_name', 'owner_last_name','price','no_of_rooms','location','water_facility', 'parking','image','email','phone','added_by', 'status','availability',
    ];

}
