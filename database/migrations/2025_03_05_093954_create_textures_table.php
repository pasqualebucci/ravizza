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
        Schema::create('textures', function (Blueprint $table) {
            $table->id();
            $table->boolean('attivo')->default(true);
            $table->json('nome');
            $table->string('slug')->unique();
            $table->string('codice_interno')->nullable()->unique();
            $table->json('label')->nullable();
            $table->decimal('prezzo', total: 5, places: 2)->nullable();
            $table->decimal('prezzo_scontato', total: 5, places: 2)->nullable();
            $table->json('descrizione')->nullable();
            $table->json('descrizione_breve')->nullable();
            $table->string('image')->nullable();
            $table->string('fabric');
            $table->foreignId('armor_id')->nullable();
            $table->foreignId('material_id')->nullable();
            $table->foreignId('design_id')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textures');
    }
};
