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
        Schema::create('detail_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('nickname')->nullable();
            $table->string('birth_place_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('school_origin')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nis')->nullable();
            $table->string('ijazah_number')->nullable();
            $table->string('skhun_number')->nullable();
            $table->string('exam_number')->nullable();
            $table->string('nik')->nullable();
            $table->integer('siblings_count')->nullable();
            $table->integer('child_position')->nullable();
            $table->string('language')->nullable();
            $table->string('special_needs')->nullable();
            $table->text('address')->nullable();
            $table->string('transport')->nullable();
            $table->string('living_with')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('kps_number')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('blood_type')->nullable();
            $table->float('distance_to_school')->nullable();
            $table->string('travel_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_students');
    }
};
