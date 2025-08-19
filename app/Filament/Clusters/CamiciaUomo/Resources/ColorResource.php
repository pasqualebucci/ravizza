<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources;

use App\Filament\Clusters\CamiciaUomo;
use App\Filament\Clusters\CamiciaUomo\Resources\ColorResource\Pages;
use App\Filament\Clusters\CamiciaUomo\Resources\ColorResource\RelationManagers;
use App\Models\Color;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Resources\Concerns\Translatable;

class ColorResource extends Resource
{
    use Translatable;
    protected static ?string $model = Color::class;

    protected static ?string $navigationIcon = 'heroicon-m-arrow-small-right';
    protected static ?string $navigationGroup = 'Caratteristiche';
    protected static ?string $navigationLabel = 'Colori';
    protected static ?string $cluster = CamiciaUomo::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\ColorPicker::make('codice')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColors::route('/'),
            'create' => Pages\CreateColor::route('/create'),
            'edit' => Pages\EditColor::route('/{record}/edit'),
        ];
    }
}
