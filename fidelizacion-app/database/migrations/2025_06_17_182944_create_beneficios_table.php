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
    Schema::create('beneficios', function (Blueprint $table) {
        $table->id();
        $table->string('empresa');
        $table->text('descripcion')->nullable();
        $table->decimal('descuento', 5, 2)->default(0); // porcentaje
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficios');
    }
};
