<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMstyles extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = MstyleResource::class;
    protected static ?string $title = 'Stili';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
