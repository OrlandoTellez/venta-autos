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
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('coche_id');

            $table->boolean('cambio_filtro')->default(false);
            $table->boolean('cambio_aceite')->default(false);
            $table->boolean('cambio_frenos')->default(false);
            $table->text('otros')->nullable();

            //  ↓ Campos nuevos, sin AFTER
            $table->date('fecha');
            $table->decimal('costo', 10, 2)->default(0);

            $table->timestamps();

            $table->foreign('coche_id')
                ->references('id')
                ->on('coches')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};
