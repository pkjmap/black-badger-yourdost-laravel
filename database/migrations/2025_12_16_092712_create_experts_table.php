<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();

            // Basic profile
            $table->string('name');
            $table->string('role'); // Psychologist, Clinical Psychologist
            $table->string('profile_image')->nullable();

            // Status
            $table->boolean('is_online')->default(false);

            // Ratings & conversations
            $table->decimal('rating', 2, 1)->default(0); // 4.7
            $table->unsignedInteger('conversations')->default(0);

            // Availability
            $table->date('next_available_date')->nullable();
            $table->string('chat_schedule')->nullable(); 
            // Example: "Wed, 02 PM - 05 PM"

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experts');
    }
};
