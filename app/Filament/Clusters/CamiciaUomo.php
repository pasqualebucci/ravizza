<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class CamiciaUomo extends Cluster
{
    
    protected static ?string $navigationIcon = 'heroicon-m-arrow-small-right';
    protected static ?string $navigationGroup = 'Capi di Abbigliamento';
    protected static ?string $navigationLabel = 'Camicia da Uomo';

    public static function getNavigationBadge(): ?string
    {
        return \App\Models\Texture::count();
    }
    //protected static ?int $navigationSort = 9;
}
