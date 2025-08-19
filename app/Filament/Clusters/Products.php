<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Products extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Ecommerce';
    protected static ?int $navigationSort = 9;

    public static function getNavigationBadge(): ?string
    {
        return \App\Models\Product::count();
    }
}
