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
        Schema::create('backs', function (Blueprint $table) {
            $table->id();
            $table->boolean('attivo')->default(true);
            $table->json('nome');
            $table->decimal('prezzo', total: 5, places: 2)->nullable();
            $table->decimal('prezzo_scontato', total: 5, places: 2)->nullable();
            $table->json('descrizione')->nullable();
            $table->string('image')->nullable();
            $table->string('material');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backs');
    }
};
