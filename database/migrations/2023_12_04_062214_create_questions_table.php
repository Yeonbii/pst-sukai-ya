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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('part_id');
            $table->integer('no');
            $table->enum('input_type', ['Input', 'Select', 'Rating', 'Checkbox', 'Textarea']);
            // Type Input
            $table->boolean('is_date');
            $table->boolean('is_number_phone');
            $table->boolean('is_number');
            $table->integer('maks_char');
            // Type Select
            $table->boolean('is_order');
            $table->boolean('has_other');
            // Type Select, Rating, dan Checkbox
            $table->integer('selection_number');
            // Type Textarea
            $table->integer('row');

            $table->string('text');
            $table->boolean('is_required');
            $table->text('note');

            $table->boolean('has_chart');
            $table->boolean('is_triggered');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
