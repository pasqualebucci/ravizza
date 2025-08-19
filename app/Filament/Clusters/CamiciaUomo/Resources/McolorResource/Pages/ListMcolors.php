<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\McolorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\McolorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMcolors extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = McolorResource::class;
    protected static ?string $title = 'Colori';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
