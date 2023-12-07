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
        Schema::create('triggers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_to');
            $table->unsignedBigInteger('question_from');
            $table->unsignedBigInteger('option_id');
            
            $table->foreign('question_to')->references('id')->on('questions');
            $table->foreign('question_from')->references('id')->on('questions');
            $table->foreign('option_id')->references('id')->on('options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triggers');
    }
};
