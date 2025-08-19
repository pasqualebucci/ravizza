<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ArmorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ArmorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArmor extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ArmorResource::class;
    protected static ?string $title = 'Modifica armatura';

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
