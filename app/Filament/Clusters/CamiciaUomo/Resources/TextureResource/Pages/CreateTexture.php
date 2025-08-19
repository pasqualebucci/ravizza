<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\TextureResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\TextureResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTexture extends CreateRecord
{
    protected static string $resource = TextureResource::class;
    protected static ?string $title = 'Nuovo tessuto';
    use CreateRecord\Concerns\Translatable;
 
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
