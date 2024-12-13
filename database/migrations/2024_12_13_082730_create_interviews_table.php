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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');  // Menyimpan id siswa
            $table->dateTime('scheduled_at');  // Jadwal wawancara
            $table->string('interviewer')->nullable();
            $table->string('status')->default('dijadwalkan');  // Status wawancara (scheduled, completed, canceled)
            $table->timestamps();

            // Menambahkan foreign key untuk student_id
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
