<?php

namespace App\Filament\Profile\Resources\OrderResource\Pages;

use App\Filament\Profile\Resources\OrderResource;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;
    protected static ?string $title = 'I miei ordini';

    

}
