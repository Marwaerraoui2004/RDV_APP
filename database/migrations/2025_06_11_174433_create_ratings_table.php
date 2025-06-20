<?php
// In database/migrations/YYYY_MM_DD_HHMMSS_create_ratings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade'); // Who received the rating
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade'); // Who gave the rating
            $table->float('rating', 2,1); // e.g., 4.5
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};