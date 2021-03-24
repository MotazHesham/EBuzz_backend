<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phone')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('adress');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('sms_alert');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('city');
            $table->string('country');
            $table->tinyInteger('block');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
