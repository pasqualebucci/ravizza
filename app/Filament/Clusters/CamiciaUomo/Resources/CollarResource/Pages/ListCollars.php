<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\CollarResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\CollarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCollars extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CollarResource::class;
    protected static ?string $title = 'Colletti';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
