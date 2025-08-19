<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ArmorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ArmorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArmors extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ArmorResource::class;
    protected static ?string $title = 'Armature';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
