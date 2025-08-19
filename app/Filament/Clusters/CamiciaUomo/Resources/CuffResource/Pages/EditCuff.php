<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\CuffResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\CuffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuff extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CuffResource::class;
    protected static ?string $title = 'Modifica polsino';

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
