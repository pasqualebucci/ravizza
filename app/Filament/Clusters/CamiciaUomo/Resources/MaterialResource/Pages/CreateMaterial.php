<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MaterialResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMaterial extends CreateRecord
{
    protected static string $resource = MaterialResource::class;
    protected static ?string $title = 'Nuovo materiale';

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
