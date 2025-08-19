<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Texture extends Model
{
    use HasTranslations;

    public $translatable = ['nome', 'label', 'descrizione', 'descrizione_breve'];

    public function armature(): BelongsTo
    {
        return $this->belongsTo(Armor::class, 'armor_id');
    }
    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function materiali(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
    public function disegni(): BelongsTo
    {
        return $this->belongsTo(Design::class, 'design_id');
    }
    public function colori(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_texture');
    }

    protected $casts = [
		'attivo' => 'boolean',
        'nome' => 'json',
        'label' => 'json',
        'descrizione' => 'json',
        'descrizione_breve' => 'json',
	];
}
