<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\SleeveResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\SleeveResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSleeve extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = SleeveResource::class;
    protected static ?string $title = 'Modifica manica';

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
