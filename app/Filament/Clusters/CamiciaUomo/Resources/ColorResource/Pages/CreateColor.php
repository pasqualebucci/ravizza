<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ColorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateColor extends CreateRecord
{
    protected static string $resource = ColorResource::class;
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
