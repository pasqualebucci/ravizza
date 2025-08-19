<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\DesignResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\DesignResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDesigns extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = DesignResource::class;

    protected static ?string $title = 'Disegni';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
