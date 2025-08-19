<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ColorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColors extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ColorResource::class;
    protected static ?string $title = 'Colori';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
