<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\BrandResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\BrandResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;
    protected static ?string $title = 'Nuovo brand';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
