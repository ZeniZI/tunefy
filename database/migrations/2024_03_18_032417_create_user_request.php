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
        Schema::create('user_request', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->integer('bpm');
            $table->string('genre');
            $table->string('instrument')->nullable();
            $table->string('chord')->nullable();
            $table->string('audio')->nullable();
            $table->string('company')->nullable();
            $table->string('notes')->nullable();
            $table->string('price')->nullable();
            $table->string('proccess')->nullable();
            $table->string('first_payment')->nullable();
            $table->string('final_payment')->nullable();
            $table->timestamps();

        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_client');
    }
    
};
