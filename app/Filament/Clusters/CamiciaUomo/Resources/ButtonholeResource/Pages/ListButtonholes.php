<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ButtonholeResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ButtonholeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListButtonholes extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ButtonholeResource::class;
    protected static ?string $title = 'Asole';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
