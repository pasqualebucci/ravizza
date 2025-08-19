<?php

namespace App\Filament\Clusters\Products\Resources;

use App\Filament\Clusters\Products;
use App\Filament\Clusters\Products\Resources\ProductResource\Pages;
use App\Filament\Clusters\Products\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

class ProductResource extends Resource
{
    use Translatable;
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-m-arrow-small-right';
    protected static ?string $navigationLabel = 'Prodotti';
    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = Products::class;

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
                            ->unique(Product::class, 'slug', ignoreRecord: true),
                        Forms\Components\TextInput::make('codice_interno')
                            ->label('SKU')
                            ->helperText(new HtmlString('Ricerca del prodotto nel backend.')),

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
                                Forms\Components\FileUpload::make('image')
                                    ->label('Immagine principale')
                                    //->helperText(new HtmlString('Carica una foto quadrata per una immagine di navigazione ottimale.'))

                                    ->columnSpanFull()
                                    ->image()
                                    ->directory('navigation')
                                    ->required(),

                                Forms\Components\FileUpload::make('gallery')
                                    ->label('Altre immagini')
                                    //->helperText(new HtmlString('Carica una foto quadrata per una immagine di navigazione ottimale.'))
                                    ->multiple()
                                    ->columnSpanFull()
                                    ->image()
                                    ->directory('gallery')
                                    ->required(),

                            ]),
                        Forms\Components\TextInput::make('label')

                            ->helperText(new HtmlString('Inserisci una label per il prodotto. Es. "Ultimi Arrivi", "Prezzo Scontato", etc.')),

                        Forms\Components\Fieldset::make('Caratteristiche')

                            ->schema([
                                Forms\Components\Select::make('categorie')
                                    ->multiple()
                                    ->preload()
                                    ->relationship('categorie', 'nome'),
                                Forms\Components\Select::make('taglie')
                                    ->label('Taglie disponibili')
                                    ->multiple()
                                    ->preload()
                                    ->relationship('taglie', 'nome'),

                                Forms\Components\Select::make('brand_id')
                                    ->preload()
                                    ->relationship('brands', 'nome')
                            ]),

                    ]),
                    Forms\Components\Section::make([
                        Forms\Components\Toggle::make('attivo')
                            ->label('Prodotto attivo')
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
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make()
                    ->beforeReplicaSaved(function (Product $replica, Product $original) {
                        $replica->slug = 'product-' . Str::random(8);
                        $replica->codice_interno = 'sku-' . Str::random(8);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
