<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('telefono')->unique();
        $table->string('password');
        $table->string('nombre');
        $table->string('apellidos');
        $table->string('direccion')->nullable();
        $table->string('correo')->unique();
        $table->string('estado')->nullable();
        $table->string('ciudad')->nullable();
        $table->integer('puntos')->default(0);
        $table->enum('rol', ['admin', 'cliente'])->default('cliente');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
