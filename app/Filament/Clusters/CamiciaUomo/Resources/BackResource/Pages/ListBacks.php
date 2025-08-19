<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\BackResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\BackResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBacks extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = BackResource::class;
    protected static ?string $title = 'Dietro';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
