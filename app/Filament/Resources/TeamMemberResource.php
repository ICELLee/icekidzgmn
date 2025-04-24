<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                TextInput::make('first_name')->label('Vorname')->required(),
                TextInput::make('last_name')->label('Nachname')->required(),
                TextInput::make('ingame_name')->label('Ingame-Name'),
                Toggle::make('show_on_home')
                    ->label('Auf Home anzeigen')
                    ->default(false),                Toggle::make('show_on_team')->label('Auf Team-Seite anzeigen'),
                Select::make('role')
                    ->label('Rolle')
                    ->options([
                        'IKRIPL' => 'ICEKIDZ Projekt Leitung',
                        'IKRIPM' => 'ICEKIDZ Managment',
                        'IKRIPM2' => 'ICEKIDZ Projekt Manager',
                        'IKRIS' => 'ICEKIDZ Support',
                        'IKRID' => 'ICEKIDZ Developer',
                        'IKRIF' => 'ICEKIDZ Friend',
                        'IKRESI' => 'Server Inhaber',
                    ])
                    ->required(),                TextInput::make('position')->label('Position'),
                TextInput::make('discord_name')->label('Discord-Name'),
                TextInput::make('private_email')->label('Private E-Mail')->email(),
                TextInput::make('assigned_email')->label('Zugewiesene E-Mail')->email(),
                FileUpload::make('profile_image')->label('Profilbild')->image()->directory('team'),
                Toggle::make('is_active')->label('Sichtbar auf Website')
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('full_name')->label('Name')->searchable(),
            TextColumn::make('ingame_name')->label('Ingame'),
            TextColumn::make('role')->label('Rolle'),
            TextColumn::make('position')->label('Position'),
            Tables\Columns\BooleanColumn::make('is_active')->label('Sichtbar'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
