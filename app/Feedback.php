<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table='feedbacks';

    protected $fillable = [
        'first_name',
        'last_name',
        'feedback',
        'email',
        'phone',
        'website',
    ];
}
