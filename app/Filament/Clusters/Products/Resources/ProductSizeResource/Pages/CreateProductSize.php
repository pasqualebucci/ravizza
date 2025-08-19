<?php

namespace App\Filament\Clusters\Products\Resources\ProductSizeResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductSizeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductSize extends CreateRecord
{
    protected static string $resource = ProductSizeResource::class;
    protected static ?string $title = 'Nuova Taglia prodotto';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
}
