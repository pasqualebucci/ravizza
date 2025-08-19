<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'snipcart_order_id',
        'email',
        'total',
        'status',
        'billing_address',
        'shipping_address',
        'items'
    ];

    protected $casts = [
        'billing_address' => 'array',
        'shipping_address' => 'array',
        'items' => 'array',
        'total' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
