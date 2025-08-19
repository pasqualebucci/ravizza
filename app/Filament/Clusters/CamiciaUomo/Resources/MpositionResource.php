<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources;

use App\Filament\Clusters\CamiciaUomo;
use App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource\Pages;
use App\Filament\Clusters\CamiciaUomo\Resources\MpositionResource\RelationManagers;
use App\Models\Mposition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;

class MpositionResource extends Resource
{
    use Translatable;
    protected static ?string $model = Mposition::class;

    protected static ?string $navigationIcon = 'heroicon-m-arrow-small-right';
    protected static ?string $navigationLabel = 'Posizioni';
    protected static ?string $navigationGroup = 'Iniziali';

    protected static ?string $cluster = CamiciaUomo::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required(),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            'index' => Pages\ListMpositions::route('/'),
            'create' => Pages\CreateMposition::route('/create'),
            'edit' => Pages\EditMposition::route('/{record}/edit'),
        ];
    }
}
