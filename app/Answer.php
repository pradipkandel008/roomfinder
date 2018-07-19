<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='answers';

    protected $fillable = [
        'answer',
        'replied_by',
        'question_id',
        'status',
    ];
}
