<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ButtonholeResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ButtonholeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateButtonhole extends CreateRecord
{
    protected static string $resource = ButtonholeResource::class;
    protected static ?string $title = 'Nuova asola';

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
