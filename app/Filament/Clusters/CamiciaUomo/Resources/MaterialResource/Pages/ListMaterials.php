<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MaterialResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterials extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = MaterialResource::class;
    protected static ?string $title = 'Materiali';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
