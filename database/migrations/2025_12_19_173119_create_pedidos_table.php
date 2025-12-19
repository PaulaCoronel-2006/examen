<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente', 100);
            $table->string('telefono', 20);
            $table->string('servicio', 50);
            $table->integer('cantidad_prendas');
            $table->string('estado', 30)->default('Recibido');
            $table->timestamps(); // Registra fecha automáticamente [cite: 481]
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
