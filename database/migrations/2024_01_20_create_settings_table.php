<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->text('address')->nullable();
            $table->string('citta')->nullable();
            $table->string('provincia')->nullable();
            $table->string('cap')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('head_scripts')->nullable();
            $table->longText('body_scripts')->nullable();
            $table->longText('footer_scripts')->nullable();
            $table->decimal('prezzo_iniziali_completo', total: 5, places: 2)->nullable();
            $table->decimal('prezzo_iniziali_per_lettera', total: 5, places: 2)->nullable();
            $table->string('prezzo_iniziali_tipo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};