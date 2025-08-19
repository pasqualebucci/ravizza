<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\BrandResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\BrandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrand extends EditRecord
{
    protected static string $resource = BrandResource::class;
    protected static ?string $title = 'Modifica brand';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
