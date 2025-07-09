<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modelos_proveedor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('agencia_id');
            $table->string('modelo');
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('proveedores')->cascadeOnDelete();
            $table->foreign('agencia_id')->references('id')->on('agencias')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelos_proveedor');
    }
};
