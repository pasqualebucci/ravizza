<?php

namespace App\Filament\Clusters\Products\Resources\ProductSizeResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductSizeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductSizes extends ListRecords
{
    protected static string $resource = ProductSizeResource::class;
    protected static ?string $title = 'Taglie prodotto';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
