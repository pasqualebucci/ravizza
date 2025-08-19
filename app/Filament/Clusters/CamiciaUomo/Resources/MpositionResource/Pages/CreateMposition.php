<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMposition extends CreateRecord
{
    protected static string $resource = MpositionResource::class;
    protected static ?string $title = 'Nuova posizione';

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
