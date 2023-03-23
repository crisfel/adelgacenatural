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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->float('weight');
            $table->float('size');
            $table->integer('blood_pressure');
            $table->integer('heartbeat');
            $table->float('temperature');
            $table->integer('glucometer');
            $table->string('last_food');
            $table->integer('oximetry');
            $table->string('oximetry_level');
            $table->float('bust')->nullable();
            $table->float('waist');
            $table->float('hip');
            $table->float('left_bicep');
            $table->float('right_bicep');
            $table->float('left_calf');
            $table->float('right_calf');
            $table->float('adipometer');
            $table->integer('imc');
            $table->integer('metabolic_age');
            $table->integer('body_water');
            $table->integer('visceral_fat');
            $table->integer('bone_mass');
            $table->integer('detox')->nullable();
            $table->string('recommendations')->nullable();
            $table->string('news')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('records');
    }
};
