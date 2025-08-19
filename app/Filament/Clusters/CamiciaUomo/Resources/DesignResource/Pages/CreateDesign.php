<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\DesignResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\DesignResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDesign extends CreateRecord
{
    protected static string $resource = DesignResource::class;

    protected static ?string $title = 'Nuovo disegno';

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
