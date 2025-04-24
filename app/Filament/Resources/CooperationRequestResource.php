<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CooperationRequestResource\Pages;
use App\Filament\Resources\CooperationRequestResource\RelationManagers;
use App\Models\CooperationRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Textarea, Select, Toggle, TagsInput};
use App\Filament\Resources\CooperationRequestResource\RelationManagers\RepliesRelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class CooperationRequestResource extends Resource
{
    protected static ?string $model = CooperationRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('ticket')->label('Ticketnummer')->disabled(),

                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('email')->required()->email(),

                TextInput::make('project_name'),
                Select::make('project_type')
                    ->required()
                    ->options([
                        'minecraft' => 'Minecraft Server',
                        'company' => 'Allgemeine Firma',
                        'youtuber' => 'YouTuber',
                        'streamer' => 'Livestreamer',
                        'influencer' => 'Influencer',
                        'clan' => 'Clan',
                        'community' => 'Community',
                        'other' => 'Etwas anderes',
                    ]),

                Textarea::make('why_fit')->label('Warum passt ihr zusammen?')->required(),
                Textarea::make('expectations')->label('Was erwartest du?')->required(),
                Textarea::make('social_media'),
                Textarea::make('coop_suggestion')->label('Kooperationsvorschlag'),

                TextInput::make('team_members')->numeric(),
                TextInput::make('user_numbers')->numeric(),

                Select::make('main_country')
                    ->required()
                    ->options([
                        'DE' => 'Deutschland',
                        'AT' => 'Österreich',
                        'CH' => 'Schweiz',
                        'US' => 'USA',
                        'UK' => 'Großbritannien',
                        'FR' => 'Frankreich',
                        'ES' => 'Spanien',
                        'IT' => 'Italien',
                        'PL' => 'Polen',
                        'NL' => 'Niederlande',
                        'BE' => 'Belgien',
                        'SE' => 'Schweden',
                        'OTHER' => 'Andere',
                    ]),

                TagsInput::make('contact_methods')->label('Kontaktmethoden'),

                TextInput::make('discord_username')->label('Discord-Name'),
                TextInput::make('whatsapp_number')->label('WhatsApp'),
                TextInput::make('instagram_username')->label('Instagram'),

                Select::make('status')
                    ->options([
                        'Offen' => 'Offen',
                        'Standard Unbeantwortet' => 'Standard Unbeantwortet',
                        'Angenommen' => 'Angenommen',
                        'Erledigt' => 'Erledigt',
                    ])
                    ->default('Offen'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ticket')
                    ->label('Ticket Nr.')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('first_name')
                    ->label('Vorname')
                    ->searchable(),

                TextColumn::make('last_name')
                    ->label('Nachname')
                    ->searchable(),

                TextColumn::make('project_name')
                    ->label('Projekt'),

                BadgeColumn::make('status')
                    ->colors([
                        'gray' => 'Offen',
                        'yellow' => 'Standard Unbeantwortet',
                        'green' => 'Angenommen',
                        'red' => 'Erledigt',
                    ])
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Bearbeiten'),
            ])
            ->defaultSort('created_at', 'desc');
    }


    public static function getRelations(): array
    {
        return [
            RepliesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCooperationRequests::route('/'),
            'create' => Pages\CreateCooperationRequest::route('/create'),
            'edit' => Pages\EditCooperationRequest::route('/{record}/edit'),
        ];
    }
}
