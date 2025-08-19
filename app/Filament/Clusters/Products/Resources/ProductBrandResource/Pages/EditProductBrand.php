<?php

namespace App\Filament\Clusters\Products\Resources\ProductBrandResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductBrand extends EditRecord
{
    protected static string $resource = ProductBrandResource::class;
     protected static ?string $title = 'Modifica Brand prodotto';

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
