<?php

namespace App\Filament\Clusters\Products\Resources\ProductCategoryResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductCategory extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ProductCategoryResource::class;
    protected static ?string $title = 'Modifica Categoria prodotto';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
