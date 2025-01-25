<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SumselResource\Pages;
use App\Filament\Resources\SumselResource\RelationManagers;
use App\Models\Sumsel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SumselResource extends Resource
{
    protected static ?string $model = Sumsel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alt_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('longitude')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('type_polygon')
                    ->required(),
                Forms\Components\Textarea::make('polygon')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('populasi')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('jumlah_restoran')
                    ->numeric(),
                Forms\Components\TextInput::make('beragama_islam')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('jumlah_kejahatan')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('ekonomi')
                    ->required()
                    ->numeric()
                    ->default(0.00),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alt_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_polygon'),
                Tables\Columns\TextColumn::make('populasi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_restoran')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beragama_islam')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_kejahatan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ekonomi')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSumsels::route('/'),
            'create' => Pages\CreateSumsel::route('/create'),
            'edit' => Pages\EditSumsel::route('/{record}/edit'),
        ];
    }
}
