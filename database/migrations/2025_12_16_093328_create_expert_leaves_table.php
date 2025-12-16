<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('expert_leaves', function (Blueprint $table) {
            $table->id();

            $table->foreignId('expert_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('leave_start');
            $table->dateTime('leave_end');

            $table->string('reason')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expert_leaves');
    }
};
