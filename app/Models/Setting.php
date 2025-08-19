<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'company_name',
        'address',
        'vat_number',
        'phone',
        'email',
        'head_scripts',
        'body_scripts',
        'footer_scripts',
        'prezzo_iniziali_completo',
        'prezzo_iniziali_per_lettera',
        'prezzo_iniziali_tipo'
    ];
}
