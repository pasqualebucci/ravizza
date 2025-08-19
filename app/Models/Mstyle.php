<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Mstyle extends Model
{
    use HasTranslations;

    public $translatable = ['nome'];

    protected $casts = [
		'nome' => 'json',
	];
}
