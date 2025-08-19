<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('fit_preference')->nullable();
            $table->string('tipo_misura');
            $table->string('unita_misura')->nullable();
            $table->string('taglia')->nullable();
            $table->decimal('collo', 5, 2)->nullable();
            $table->decimal('torace', 5, 2)->nullable();
            $table->decimal('girovita', 5, 2)->nullable();
            $table->decimal('spalle', 5, 2)->nullable();
            $table->decimal('braccia', 5, 2)->nullable();
            $table->decimal('polso', 5, 2)->nullable();
            $table->decimal('lunghezza', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('measurements');
    }
};