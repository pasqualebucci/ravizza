<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMstyle extends CreateRecord
{
    protected static string $resource = MstyleResource::class;
    protected static ?string $title = 'Nuovo stile';

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
