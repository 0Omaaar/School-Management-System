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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('academic_year');
            $table->string('date_birth');

            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('nationalitie_id');
            $table->unsignedBigInteger('blood_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('parent_id');

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nationalitie_id')->references('id')->on('nationalitiev2s')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blood_id')->references('id')->on('type_bloods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
