<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\CollarResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\CollarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCollar extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CollarResource::class;
    protected static ?string $title = 'Modifica colletto';

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
