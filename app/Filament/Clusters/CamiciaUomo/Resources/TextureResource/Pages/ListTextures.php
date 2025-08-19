<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\TextureResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\TextureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\TextureExporter;

class ListTextures extends ListRecords
{
    protected static string $resource = TextureResource::class;
    protected static ?string $title = 'Elenco tessuti';

    use ListRecords\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ExportAction::make()
                ->label('Esporta tessuti')
                ->exporter(TextureExporter::class),
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
