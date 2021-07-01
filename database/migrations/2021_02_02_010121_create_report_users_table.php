<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_users', function (Blueprint $table) {
            $table->string('reason')->nullable();
            $table->unsignedBigInteger('user_reported_id');
            $table->unsignedBigInteger('user_reporter_id');
            $table->foreign('user_reported_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_reporter_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_users');
    }
}
