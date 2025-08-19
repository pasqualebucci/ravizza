<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ColorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColor extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ColorResource::class;
    protected static ?string $title = 'Modifica colore';

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
