<?php

namespace App\Filament\Clusters\Products\Resources\ProductSizeResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductSizeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductSize extends EditRecord
{
    protected static string $resource = ProductSizeResource::class;
    protected static ?string $title = 'Modifica Taglia prodotto';

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
