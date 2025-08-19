<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\BrandResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\BrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;
    protected static ?string $title = 'Brands';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
