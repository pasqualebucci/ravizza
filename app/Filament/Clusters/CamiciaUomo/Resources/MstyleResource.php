<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources;

use App\Filament\Clusters\CamiciaUomo;
use App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource\Pages;
use App\Filament\Clusters\CamiciaUomo\Resources\MstyleResource\RelationManagers;
use App\Models\Mstyle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;

class MstyleResource extends Resource
{
    use Translatable;
    protected static ?string $model = Mstyle::class;

    protected static ?string $navigationIcon = 'heroicon-m-arrow-small-right';
    protected static ?string $navigationLabel = 'Stili';
    protected static ?string $navigationGroup = 'Iniziali';

    protected static ?string $cluster = CamiciaUomo::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required(),
                Forms\Components\TextInput::make('font_family')
                    ->required()
                    ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('font_family')
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
            'index' => Pages\ListMstyles::route('/'),
            'create' => Pages\CreateMstyle::route('/create'),
            'edit' => Pages\EditMstyle::route('/{record}/edit'),
        ];
    }
}
