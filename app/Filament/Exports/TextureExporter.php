<?php

namespace App\Filament\Exports;

use App\Models\Texture;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class TextureExporter extends Exporter
{
    protected static ?string $model = Texture::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('attivo'),
            ExportColumn::make('nome'),
            ExportColumn::make('slug'),
            ExportColumn::make('codice_interno'),
            ExportColumn::make('label'),
            ExportColumn::make('prezzo'),
            ExportColumn::make('prezzo_scontato'),
            ExportColumn::make('descrizione'),
            ExportColumn::make('descrizione_breve'),
            ExportColumn::make('image'),
            ExportColumn::make('fabric'),
            ExportColumn::make('armor_id'),
            ExportColumn::make('material_id'),
            ExportColumn::make('design_id'),
            ExportColumn::make('brand_id'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your texture export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
