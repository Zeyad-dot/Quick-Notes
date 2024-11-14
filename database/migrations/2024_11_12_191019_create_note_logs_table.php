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
        Schema::create('note_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id')->nullable();
            $table->string('action');
            $table->timestamps();
            $table->string('note_title')->nullable();
            $table->string('user_name')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_logs');
    }
};