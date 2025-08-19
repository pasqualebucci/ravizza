<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\CuffResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\CuffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuffs extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CuffResource::class;
    protected static ?string $title = 'Polsini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
