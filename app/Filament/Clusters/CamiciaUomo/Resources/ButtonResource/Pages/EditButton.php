<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ButtonResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ButtonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditButton extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ButtonResource::class;
    protected static ?string $title = 'Modifica bottone';

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
