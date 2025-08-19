<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductCategory extends Model
{
    use HasTranslations;

    public $translatable = ['nome'];

    public function prodotti(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    protected $casts = [
		'nome' => 'json',
	];
}
