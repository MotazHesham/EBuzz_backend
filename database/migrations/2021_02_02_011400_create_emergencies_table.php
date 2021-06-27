<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('road')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('emergencies');
    }
}
