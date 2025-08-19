<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\TextureResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\TextureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTexture extends EditRecord
{
    protected static string $resource = TextureResource::class;
    protected static ?string $title = 'Modifica tessuto';
    use EditRecord\Concerns\Translatable;

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
