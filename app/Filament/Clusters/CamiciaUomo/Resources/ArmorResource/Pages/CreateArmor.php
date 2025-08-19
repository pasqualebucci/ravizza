<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\ArmorResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\ArmorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArmor extends CreateRecord
{
    protected static string $resource = ArmorResource::class;
    protected static ?string $title = 'Nuova armatura';

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
