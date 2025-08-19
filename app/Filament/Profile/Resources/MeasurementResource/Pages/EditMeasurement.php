<?php

namespace App\Filament\Profile\Resources\MeasurementResource\Pages;

use App\Filament\Profile\Resources\MeasurementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMeasurement extends EditRecord
{
    protected static string $resource = MeasurementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
