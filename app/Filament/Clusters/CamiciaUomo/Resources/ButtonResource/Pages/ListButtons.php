<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ButtonResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ButtonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListButtons extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ButtonResource::class;
    protected static ?string $title = 'Bottoni';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
