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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 15, 2);
            $table->string('status')->default('pending');
            $table->string('payment_type')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->text('description')->nullable();
            $table->text('snap_token')->nullable();
            $table->timestamps();

            // Foreign key relation
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
