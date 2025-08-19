<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMposition extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = MpositionResource::class;
    protected static ?string $title = 'Modifica posizione';

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
