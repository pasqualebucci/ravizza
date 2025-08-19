<?php

namespace App\Filament\Clusters\Products\Resources\ProductBrandResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductBrand extends CreateRecord
{
    protected static string $resource = ProductBrandResource::class;
     protected static ?string $title = 'Nuovo Brand prodotto';
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
