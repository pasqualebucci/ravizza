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
        Schema::create('wishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('tessuto_id');
            $table->string('tessuto_nome');
            $table->string('tessuto_slug');
            $table->string('tessuto_image');
            $table->unsignedInteger('colletto_id');
            $table->unsignedInteger('manica_id');
            $table->unsignedInteger('polsino_id');
            $table->unsignedInteger('fronte_id');
            $table->unsignedInteger('dietro_id');
            $table->unsignedInteger('taschino_id');
            $table->unsignedInteger('bottone_id');
            $table->unsignedInteger('asola_id');
            $table->string('iniziali')->nullable();
            $table->string('iniz_colore')->nullable();
            $table->string('iniz_stile')->nullable();
            $table->string('iniz_posizione')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishes');
    }
};
