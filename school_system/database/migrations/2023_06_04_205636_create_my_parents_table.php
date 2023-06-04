<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name_father');
            $table->string('national_id_father');
            $table->string('passport_id_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->unsignedBigInteger('nationality_father_id');
            $table->unsignedBigInteger('blood_type_father_id');
            $table->unsignedBigInteger('religion_father_id');
            $table->foreign('nationality_father_id')->references('id')->on('nationalitiev2s')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blood_type_father_id')->references('id')->on('type_bloods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('religion_father_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('address_father');

            $table->string('name_mother');
            $table->string('national_id_mother');
            $table->string('passport_id_mother');
            $table->string('phone_mother');
            $table->string('job_mother');
            $table->unsignedBigInteger('nationality_mother_id');
            $table->unsignedBigInteger('blood_type_mother_id');
            $table->unsignedBigInteger('religion_mother_id');
            $table->foreign('nationality_mother_id')->references('id')->on('nationalitiev2s')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blood_type_mother_id')->references('id')->on('type_bloods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('religion_mother_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('address_mother');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_parents');
    }
};
