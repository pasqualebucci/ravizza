<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Design extends Model
{
    use HasTranslations;

    public $translatable = ['nome'];

    public function tessuti(): BelongsTo
    {
        return $this->belongsTo(Texture::class);
    }
    protected $casts = [
		'nome' => 'json',
	];
}
