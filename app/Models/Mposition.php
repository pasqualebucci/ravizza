<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Mposition extends Model
{
    use HasTranslations;

    public $translatable = ['nome'];

    protected $casts = [
		'nome' => 'json',
	];
}
