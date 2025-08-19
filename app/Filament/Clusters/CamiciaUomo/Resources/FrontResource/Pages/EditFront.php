<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\FrontResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\FrontResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFront extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = FrontResource::class;
    protected static ?string $title = 'Modifica fronte';

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
