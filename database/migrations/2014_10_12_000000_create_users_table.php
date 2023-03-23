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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('url_img')->nullable();
            $table->string('password');
            $table->date('date')->nullable();
            $table->integer('age')->nullable();
            $table->string('role');
            $table->string('occupation')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('locality')->nullable();
            $table->longText('pathological_history')->nullable();
            $table->longText('cardiovascular')->nullable();
            $table->longText('pulmonary')->nullable();
            $table->longText('digestive')->nullable();
            $table->longText('diabetes')->nullable();
            $table->longText('kidney')->nullable();
            $table->longText('clotting_problems')->nullable();
            $table->longText('surgical')->nullable();
            $table->longText('allergies')->nullable();
            $table->longText('medicines')->nullable();
            $table->boolean('alcohol')->nullable();
            $table->boolean('smoking')->nullable();
            $table->boolean('dope')->nullable();
            $table->longText('family_background')->nullable();
            $table->longText('emotional_background')->nullable();
            $table->longText( 'comment')->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->unsignedBigInteger('therapist_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('therapist_id')->references('id')->on('users');
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
};
