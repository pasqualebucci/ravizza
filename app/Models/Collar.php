<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Collar extends Model
{
    use HasTranslations;

    public $translatable = ['nome', 'descrizione'];
    
    protected $casts = [
		'attivo' => 'boolean',
        'nome' => 'json',
        'descrizione' => 'json',
	];
}
