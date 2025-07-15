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
           Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        
        // Llaves foráneas
        $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
        $table->foreignId('patient_id')->constrained()->onDelete('cascade');
        
        // Fecha y hora de la cita
        $table->date('date');
        $table->time('time');
        
        // Estado de la cita
        $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
        
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
