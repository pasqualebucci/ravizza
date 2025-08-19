<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\OrderExporter;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;
    protected static ?string $title = 'Elenco ordini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ExportAction::make()
                ->label('Esporta ordini')
                ->exporter(OrderExporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
