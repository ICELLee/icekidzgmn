<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimelineEventResource\Pages;
use App\Filament\Resources\TimelineEventResource\RelationManagers;
use App\Models\TimelineEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\{TextInput, Textarea, Select, Toggle, TagsInput};
use Filament\Forms\Components\FileUpload;

class TimelineEventResource extends Resource
{
    protected static ?string $model = TimelineEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Textarea::make('description')->required(),
                TextInput::make('date')->label('Datum')->required(),
                Select::make('color')
                    ->options([
                        'bg-purple-500' => 'Lila',
                        'bg-blue-500' => 'Blau',
                        'bg-green-500' => 'Grün',
                        'bg-red-500' => 'Rot',
                        'bg-yellow-500' => 'Gelb',
                    ])
                    ->required(),
                TextInput::make('icon')->placeholder('z.B. fas fa-star'),
                FileUpload::make('image')
                    ->directory('timeline_images')
                    ->image()
                   ->preserveFilenames()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('date')->sortable(),
                TextColumn::make('color'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTimelineEvents::route('/'),
            'create' => Pages\CreateTimelineEvent::route('/create'),
            'edit' => Pages\EditTimelineEvent::route('/{record}/edit'),
        ];
    }
}
