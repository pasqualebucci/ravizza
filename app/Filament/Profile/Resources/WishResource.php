<?php

namespace App\Filament\Profile\Resources;

use App\Filament\Profile\Resources\WishResource\Pages;
use App\Filament\Profile\Resources\WishResource\RelationManagers;
use App\Models\Wish;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WishResource extends Resource
{
    protected static ?string $model = Wish::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationLabel = 'Le mie creazioni';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->id())->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tessuto_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tessuto_nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tessuto_slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('tessuto_image')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('colletto_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('manica_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('polsino_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('fronte_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dietro_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('taschino_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('bottone_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('asola_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('iniziali')
                    ->maxLength(255),
                Forms\Components\TextInput::make('iniz_colore')
                    ->maxLength(255),
                Forms\Components\TextInput::make('iniz_stile')
                    ->maxLength(255),
                Forms\Components\TextInput::make('iniz_posizione')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('tessuto_image')
                    ->label('Immagine tessuto'),
                Tables\Columns\TextColumn::make('tessuto_nome')
                    ->label('Nome tessuto')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                ->label('Data creazione')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->requiresConfirmation(),
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
            'index' => Pages\ListWishes::route('/'),
            'create' => Pages\CreateWish::route('/create'),
            'edit' => Pages\EditWish::route('/{record}/edit'),
        ];
    }
}
