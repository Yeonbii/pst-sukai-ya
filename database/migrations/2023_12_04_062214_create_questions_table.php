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
            $table->enum('input_type', ['1', '2', '3', '4', '5', '6', '7', '8', '9']);
            // 1 -> Input : Text
            // 2 -> Input : Numeric
            // 3 -> Input : Date
            // 4 -> Input : (Phone Number)
            // 5 -> Select : (Pilih salah satu)
            // 6 -> Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)
            // 7 -> Select : Yes or No
            // 8 -> Rating (Pilih 1 s/d 10)
            // 9 -> Textarea

            // Input : Text
            $table->integer('maks_char');

            // Select : (Pilih Salah Satu)
            $table->boolean('has_other');
            $table->integer('option_number');

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
