<?php

namespace App\Filament\Profile\Resources;

use App\Filament\Profile\Resources\MeasurementResource\Pages;
use App\Filament\Profile\Resources\MeasurementResource\RelationManagers;
use App\Models\Measurement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeasurementResource extends Resource
{
    protected static ?string $model = Measurement::class;

    protected static ?string $navigationIcon = 'hugeicons-tape-measure';
    protected static ?string $navigationLabel = 'Le mie misure';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\Components\TextInput::make('fit_preference')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tipo_misura')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('taglia')
                    ->maxLength(255),
                    Forms\Components\TextInput::make('unita_misura')
                    ->maxLength(255),
                Forms\Components\TextInput::make('collo')
                    ->numeric(),
                Forms\Components\TextInput::make('torace')
                    ->numeric(),
                Forms\Components\TextInput::make('girovita')
                    ->numeric(),
                Forms\Components\TextInput::make('spalle')
                    ->numeric(),
                Forms\Components\TextInput::make('braccia')
                    ->numeric(),
                Forms\Components\TextInput::make('polso')
                    ->numeric(),
                Forms\Components\TextInput::make('lunghezza')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('fit_preference'),
                Tables\Columns\TextColumn::make('tipo_misura'),
                Tables\Columns\TextColumn::make('taglia'),
                Tables\Columns\TextColumn::make('unita_misura'),
                Tables\Columns\TextColumn::make('collo')
                    ->numeric(),
                Tables\Columns\TextColumn::make('torace')
                    ->numeric(),
                Tables\Columns\TextColumn::make('girovita')
                    ->numeric(),
                Tables\Columns\TextColumn::make('spalle')
                    ->numeric(),
                Tables\Columns\TextColumn::make('braccia')
                    ->numeric(),
                Tables\Columns\TextColumn::make('polso')
                    ->numeric(),
                Tables\Columns\TextColumn::make('lunghezza')
                    ->numeric(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->modifyQueryUsing(fn ($query) => $query->where('user_id', auth()->id()))
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMeasurements::route('/'),
            'edit' => Pages\EditMeasurement::route('/{record}/edit'),
        ];
    }
}
