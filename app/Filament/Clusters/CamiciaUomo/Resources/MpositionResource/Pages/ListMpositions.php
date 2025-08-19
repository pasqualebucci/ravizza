<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMpositions extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = MpositionResource::class;
    protected static ?string $title = 'Posizioni';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
