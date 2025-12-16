<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('expert_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('expert_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('day', [
                'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'
            ]);

            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();

            $table->unique(['expert_id', 'day']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expert_schedules');
    }
};
