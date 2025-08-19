<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\PocketResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\PocketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPockets extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = PocketResource::class;
    protected static ?string $title = 'Taschini';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
