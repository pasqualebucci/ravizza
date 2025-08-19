<?php

namespace App\Filament\Clusters\Products\Resources\ProductResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\ProductExporter;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;
    protected static ?string $title = 'Elenco prodotti';
    
    use ListRecords\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ExportAction::make()
                ->label('Esporta prodotti')
                ->exporter(ProductExporter::class),
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
