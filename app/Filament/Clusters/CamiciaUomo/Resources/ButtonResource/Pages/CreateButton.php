<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ButtonResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ButtonResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateButton extends CreateRecord
{
    protected static string $resource = ButtonResource::class;
    protected static ?string $title = 'Nuovo bottone';

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
