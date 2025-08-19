<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    use HasTranslations;

    public $translatable = ['nome'];

    public function tessuti(): BelongsToMany
    {
        return $this->belongsToMany(Texture::class);
    }
    protected $casts = [
		'nome' => 'json',
	];
}
