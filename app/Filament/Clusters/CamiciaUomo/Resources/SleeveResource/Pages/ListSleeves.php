<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\SleeveResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\SleeveResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSleeves extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = SleeveResource::class;
    protected static ?string $title = 'Maniche';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
