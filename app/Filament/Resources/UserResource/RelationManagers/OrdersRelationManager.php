<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';
    protected static ?string $title = 'Ordini';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('snipcart_order_id')
                    ->label('Ordine ID')
                    ->columnSpanFull()
                    ->disabled(),
                Forms\Components\TextInput::make('status')
                    ->disabled(),


                Forms\Components\TextInput::make('email')
                    ->disabled(),
                Forms\Components\DatePicker::make('created_at')
                    ->date()
                    ->label('Data Ordine')
                    ->disabled(),
                Forms\Components\TextInput::make('total')
                    ->label('Totale Ordine')
                    ->prefix('€')
                    ->disabled(),

                Forms\Components\Section::make('Indirizzo di fatturazione')
                    ->collapsible()
                    ->persistCollapsed()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('billing_address_name')
                                    ->label('Nome')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->billing_address, true)['name'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('billing_address_address1')
                                    ->label('Indirizzo')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->billing_address, true)['address1'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('billing_address_address2')
                                    ->label('Indirizzo (continua)')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->billing_address, true)['address2'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('billing_address_city')
                                    ->label('Città')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->billing_address, true)['city'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('billing_address_country')
                                    ->label('Paese')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->billing_address, true)['country'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('billing_address_postalCode')
                                    ->label('CAP')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->billing_address, true)['postalCode'] ?? '')
                                    ->disabled(),
                            ]),
                    ]),

                Forms\Components\Section::make('Indirizzo di spedizione')
                    ->collapsible()
                    ->persistCollapsed()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('shipping_address_name')
                                    ->label('Nome')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->shipping_address, true)['name'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('shipping_address_address1')
                                    ->label('Indirizzo')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->shipping_address, true)['address1'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('shipping_address_address2')
                                    ->label('Indirizzo (continua)')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->shipping_address, true)['address2'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('shipping_address_city')
                                    ->label('Città')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->shipping_address, true)['city'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('shipping_address_country')
                                    ->label('Paese')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->shipping_address, true)['country'] ?? '')
                                    ->disabled(),
                                Forms\Components\TextInput::make('shipping_address_postalCode')
                                    ->label('CAP')
                                    ->formatStateUsing(fn($state, $record) => json_decode($record->shipping_address, true)['postalCode'] ?? '')
                                    ->disabled(),
                            ]),
                    ]),




                Forms\Components\Section::make('Articoli Ordinati')
                    ->schema([
                        Forms\Components\ViewField::make('items')
                            ->view('filament.forms.components.order-items')
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->persistCollapsed(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('snipcart_order_id')
            ->columns([

                Tables\Columns\TextColumn::make('snipcart_order_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Totale')
                    ->prefix('€'),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
