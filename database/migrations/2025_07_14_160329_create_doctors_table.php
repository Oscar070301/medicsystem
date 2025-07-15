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
            Schema::create('doctors', function (Blueprint $table) {
        $table->id(); // Crea una columna "id" AUTO_INCREMENT y PRIMARY KEY
        $table->string('name'); // Columna "name" tipo VARCHAR(255)
        $table->string('specialty'); // Columna "specialty" tipo VARCHAR(255)
        $table->string('email')->unique(); // Columna "email" VARCHAR(255) única
        $table->string('phone')->nullable(); // Columna "phone", puede ser NULL
        $table->timestamps(); // Crea "created_at" y "updated_at"
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
