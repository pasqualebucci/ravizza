<?php

namespace App\Filament\Profile\Resources\MeasurementResource\Pages;

use App\Filament\Profile\Resources\MeasurementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMeasurements extends ListRecords
{
    protected static string $resource = MeasurementResource::class;
    protected static ?string $title = 'Le mie misure';
    
}
