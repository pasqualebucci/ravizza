<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\BackResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\BackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBack extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = BackResource::class;
    protected static ?string $title = 'Modifica dietro';

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
