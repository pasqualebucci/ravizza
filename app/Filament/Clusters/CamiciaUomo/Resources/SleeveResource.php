<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources;

use App\Filament\Clusters\CamiciaUomo;
use App\Filament\Clusters\CamiciaUomo\Resources\SleeveResource\Pages;
use App\Filament\Clusters\CamiciaUomo\Resources\SleeveResource\RelationManagers;
use App\Models\Sleeve;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;

class SleeveResource extends Resource
{
    use Translatable;
    protected static ?string $model = Sleeve::class;

    protected static ?string $navigationIcon = 'heroicon-m-arrow-small-right';
    protected static ?string $navigationGroup = 'Personalizzazioni';
    protected static ?string $navigationLabel = 'Maniche';
    protected static ?int $navigationSort = 2;
    protected static ?string $cluster = CamiciaUomo::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Split::make([
                    Forms\Components\Section::make([
                        Forms\Components\TextInput::make('nome')
                            ->maxLength(255)
                            ->required(),
                            Forms\Components\Textarea::make('descrizione')
                            ->columnSpanFull(),
                       
                        
                        Forms\Components\Fieldset::make('Prezzo')
                            ->label('')
                            ->schema([
                                Forms\Components\TextInput::make('prezzo')
                                    ->required()
                                    ->prefix('€')
                                    ->numeric()
                                    ->inputMode('decimal'),
                                Forms\Components\TextInput::make('prezzo_scontato')
                                    ->prefix('€')
                                    ->numeric()
                                    ->inputMode('decimal'),
                                
                            ]),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('Immagine di navigazione')
                            ->columnSpanFull()
                            ->image()
                            ->directory('sleeves')
                            ->required(),
                       
                        
                    ]),
                    Forms\Components\Section::make([
                        Forms\Components\Toggle::make('attivo')
                            ->label('Manica attiva')
                            ->default(true)
                            ->columnSpanFull()
                            ->required(),
                    
                    ])
                        ->grow(false),


                ])->from('md'),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('attivo'),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Navigazione')
                    ->square()
                    ->size(100),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
               
                Tables\Columns\TextColumn::make('descrizione')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prezzo')
                    ->prefix('€'),
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
            'index' => Pages\ListSleeves::route('/'),
            'edit' => Pages\EditSleeve::route('/{record}/edit'),
        ];
    }
}
