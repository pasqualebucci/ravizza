<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MaterialResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaterial extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = MaterialResource::class;
    protected static ?string $title = 'Modifica materiale';

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
