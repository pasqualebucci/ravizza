<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ButtonholeResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ButtonholeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditButtonhole extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ButtonholeResource::class;
    protected static ?string $title = 'Modifica asola';

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
