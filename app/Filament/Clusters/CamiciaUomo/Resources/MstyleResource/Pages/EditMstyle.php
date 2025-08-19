<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMstyle extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = MstyleResource::class;
    protected static ?string $title = 'Modifica stile';

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
