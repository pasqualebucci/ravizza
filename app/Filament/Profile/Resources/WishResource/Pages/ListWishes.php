<?php

namespace App\Filament\Profile\Resources\WishResource\Pages;

use App\Filament\Profile\Resources\WishResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWishes extends ListRecords
{
    protected static string $resource = WishResource::class;
    protected static ?string $title = 'Le mie creazioni';

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
