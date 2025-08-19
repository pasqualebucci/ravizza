<?php

namespace App\Filament\Clusters\Products\Resources\ProductBrandResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductBrands extends ListRecords
{
    protected static string $resource = ProductBrandResource::class;
     protected static ?string $title = 'Brands prodotto';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
