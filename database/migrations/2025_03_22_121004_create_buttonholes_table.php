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
        Schema::create('buttonholes', function (Blueprint $table) {
            $table->id();
            $table->boolean('attivo')->default(true);
            $table->json('nome');
            $table->json('descrizione')->nullable();
            $table->decimal('prezzo', total: 5, places: 2)->nullable();
            $table->decimal('prezzo_scontato', total: 5, places: 2)->nullable();
            $table->string('image')->nullable();
            $table->string('colore');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buttonholes');
    }
};
