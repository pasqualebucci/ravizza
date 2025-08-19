<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources\PocketResource\Pages;

use App\Filament\Clusters\CamiciaUomo\Resources\PocketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPocket extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = PocketResource::class;
    protected static ?string $title = 'Modifica taschino';

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
