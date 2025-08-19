<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\McolorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\McolorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMcolor extends CreateRecord
{
    protected static string $resource = McolorResource::class;
    protected static ?string $title = 'Nuovo colore';

    use CreateRecord\Concerns\Translatable;
 
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
