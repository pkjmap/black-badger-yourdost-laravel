<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_requests', function (Blueprint $table) {
            $table->id();

            // What are you looking for
            $table->string('inquiry_type');

            // Basic details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number', 20);
            $table->string('email');

            // Organization details
            $table->string('organization');
            $table->string('role');

            // Optional message
            $table->text('help_message')->nullable();

            // How did you hear about us (multiple)
            $table->json('heard_from')->nullable();

            // Meta
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_requests');
    }
};
