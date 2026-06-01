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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
$table->string('ticket_number')->unique();

    $table->foreignId('requester_id')
          ->constrained('users');

    $table->foreignId('department_id')
          ->constrained();

    $table->foreignId('category_id')
          ->constrained();

    $table->foreignId('assigned_to')
          ->nullable()
          ->constrained('users');

    $table->string('subject');

    $table->text('description');

    $table->enum('priority', [
        'low',
        'medium',
        'high',
        'critical'
    ])->default('medium');

    $table->enum('status', [
        'new',
        'assigned',
        'in_progress',
        'waiting_for_user',
        'completed',
        'reopened',
        'closed',
        'cancelled'
    ])->default('new');

    $table->timestamp('completed_at')->nullable();
    $table->timestamp('closed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
