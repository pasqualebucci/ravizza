<?php

namespace App\Filament\Clusters\CamiciaUomo\Resources;

use App\Filament\Clusters\CamiciaUomo;
use App\Filament\Clusters\CamiciaUomo\Resources\TextureResource\Pages;
use App\Filament\Clusters\CamiciaUomo\Resources\TextureResource\RelationManagers;
use App\Models\Texture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;

use Filament\Forms\Components\ViewField;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Actions\Action;

use Illuminate\Support\Str;


class TextureResource extends Resource
{
    use Translatable;
    protected static ?string $model = Texture::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static ?string $navigationLabel = 'Tessuti';
    protected static ?int $navigationSort = 4;



    protected static ?string $cluster = CamiciaUomo::class;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Split::make([
                    Forms\Components\Section::make([
                        Forms\Components\TextInput::make('nome')
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->required()
                            ->afterStateUpdated(fn($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Texture::class, 'slug', ignoreRecord: true),
                        Forms\Components\TextInput::make('codice_interno')
                            ->label('SKU')
                            ->helperText(new HtmlString('Ricerca del tessuto nel backend.')),
                        Forms\Components\Fieldset::make('Descrizione')

                            ->label('')
                            ->schema([
                                Forms\Components\Textarea::make('descrizione_breve')
                                    ->columnSpanFull()
                                    ->required(),
                                Forms\Components\RichEditor::make('descrizione')
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'blockquote',
                                        'attachFiles',
                                        'codeBlock',
                                    ])
                                    ->required(),
                            ]),
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
                        Forms\Components\Fieldset::make('Immagini')

                            ->schema([
                                Forms\Components\FileUpload::make('fabric')
                                    ->label('Texture del tessuto')
                                    ->helperText(new HtmlString('Carica una texture ripetibile e goditi il nostro <b>Magic Texturing Engine</b> per una copertura ottimale sul capo.'))

                                    ->columnSpanFull()
                                    ->image()
                                    ->imageEditor()
                                    ->directory('fabrics')
                                    ->required(),
                                Forms\Components\FileUpload::make('image')
                                    ->label('Immagine di navigazione')
                                    ->helperText(new HtmlString('Carica una foto quadrata per una immagine di navigazione ottimale.'))

                                    ->columnSpanFull()
                                    ->image()
                                    ->directory('navigation')
                                    ->required(),
                            ]),
                        Forms\Components\TextInput::make('label')

                            ->helperText(new HtmlString('Inserisci una label per il tessuto. Es. "Ultimi Arrivi", "Prezzo Scontato", etc.')),

                        Forms\Components\Fieldset::make('Caratteristiche')

                            ->schema([
                                Forms\Components\Select::make('armor_id')
                                    ->preload()
                                    ->relationship('armature', 'nome'),
                                Forms\Components\Select::make('material_id')
                                    ->preload()
                                    ->relationship('materiali', 'nome'),

                                Forms\Components\Select::make('design_id')
                                    ->preload()
                                    ->relationship('disegni', 'nome'),

                                Forms\Components\Select::make('colori')
                                    ->multiple()
                                    ->preload()
                                    ->relationship('colori', 'nome'),
                                Forms\Components\Select::make('brand_id')
                                    ->preload()
                                    ->relationship('brands', 'nome')
                            ]),
                    ]),
                    Forms\Components\Section::make([
                        Forms\Components\Toggle::make('attivo')
                            ->label('Tessuto attivo')
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
                Tables\Columns\TextColumn::make('codice_interno')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Navigazione')
                    ->square()
                    ->size(100),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                //Tables\Columns\TextColumn::make('descrizione_breve')->searchable(),
                Tables\Columns\TextColumn::make('prezzo')
                    ->prefix('€'),


            ])
            ->defaultSort('created_at', 'desc')

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make()
                    ->beforeReplicaSaved(function (Texture $replica, Texture $original) {
                        $replica->slug = 'texture-' . Str::random(8);
                    })
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
            'index' => Pages\ListTextures::route('/'),
            'create' => Pages\CreateTexture::route('/create'),
            'edit' => Pages\EditTexture::route('/{record}/edit'),
        ];
    }
}
