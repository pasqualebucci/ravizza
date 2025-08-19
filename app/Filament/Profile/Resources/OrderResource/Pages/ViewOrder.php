<?php

namespace App\Filament\Profile\Resources\OrderResource\Pages;

use App\Filament\Profile\Resources\OrderResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;
    protected static ?string $title = 'Visualizza Ordine';

}