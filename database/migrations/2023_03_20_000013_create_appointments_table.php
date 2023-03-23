<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->time('time');
            $table->string('status');
            $table->longText('comment')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('therapist_id');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('therapist_id')->references('id')->on('users');
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
        Schema::dropIfExists('appointments');
    }
};
