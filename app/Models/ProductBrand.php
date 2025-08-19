<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductBrand extends Model
{
    public function tessuti(): BelongsTo
    {
        return $this->belongsTo(Texture::class);
    }
}
