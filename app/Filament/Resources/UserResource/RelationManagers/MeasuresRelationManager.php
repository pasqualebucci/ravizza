<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeasuresRelationManager extends RelationManager
{
    protected static string $relationship = 'measures';
    protected static ?string $title = 'Misure';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('tipo_misura')
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                
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
