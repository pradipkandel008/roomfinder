<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('gender',10);
            $table->string('dob',100);
            $table->string('occupation',100);
            $table->string('marital_status',100);
            $table->string('image',255);
            $table->string('email',255);
            $table->string('phone',15);
            $table->string('booked_by',255);
            $table->string('room_id',50);
            $table->boolean('status',10)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookrooms');
    }
}
