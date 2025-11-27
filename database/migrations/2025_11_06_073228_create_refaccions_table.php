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
        Schema::create('refacciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('codigo', 100)->unique();
            $table->string('marca', 100);
            $table->string('categoria', 100);
            $table->text('descripcion');
            $table->decimal('precio', 10, 2);
            $table->decimal('precio_compra', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('stock_minimo')->default(5);
            $table->string('imagen', 10)->default('🔧');
            $table->string('proveedor', 255)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refacciones');
    }
};