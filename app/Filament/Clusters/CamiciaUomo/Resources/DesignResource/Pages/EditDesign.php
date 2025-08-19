<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\DesignResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\DesignResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesign extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = DesignResource::class;

    protected static ?string $title = 'Modifica disegno';

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
