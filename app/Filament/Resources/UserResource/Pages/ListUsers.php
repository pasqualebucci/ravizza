<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\UserExporter;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    protected static ?string $title = 'Elenco utenti';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ExportAction::make()
                ->label('Esporta utenti')
                ->exporter(UserExporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
