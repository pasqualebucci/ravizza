<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\FrontResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\FrontResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFronts extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = FrontResource::class;
    protected static ?string $title = 'Fronte';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
