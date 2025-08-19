<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasTranslations;
    public $translatable = ['nome', 'label', 'descrizione', 'descrizione_breve'];

    public function brands(): BelongsTo
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id');
    }
    public function taglie(): BelongsToMany
    {
        return $this->belongsToMany(ProductSize::class, 'product_size', 'product_id', 'size_id');
    }
    public function categorie(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'category_product','product_id','category_id');
    }
    public function variants()
    {
        return $this->belongsToMany(Product::class, 'product_variants', 'product_id', 'variant_id');
    }

    public function parentProducts()
    {
        return $this->belongsToMany(Product::class, 'product_variants', 'variant_id', 'product_id');
    }


    protected $casts = [
        'attivo' => 'boolean',
        'nome' => 'json',
        'label' => 'json',
        'descrizione' => 'json',
        'descrizione_breve' => 'json',
        'gallery' => 'array',
    ];
}
