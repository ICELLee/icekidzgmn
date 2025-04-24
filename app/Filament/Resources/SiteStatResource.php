<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteStatResource\Pages;
use App\Filament\Resources\SiteStatResource\RelationManagers;
use App\Models\SiteStat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class SiteStatResource extends Resource
{
    protected static ?string $model = SiteStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Bezeichnung')
                ->disabled(),

            TextInput::make('value')
                ->label('Wert')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Statistik'),
            TextColumn::make('value')->label('Wert')->sortable(),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSiteStats::route('/'),
            'create' => Pages\CreateSiteStat::route('/create'),
            'edit' => Pages\EditSiteStat::route('/{record}/edit'),
        ];
    }
}
