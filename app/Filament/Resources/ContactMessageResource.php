<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\TextColumn;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Kontaktanfragen';
    protected static ?string $modelLabel = 'Kontaktanfrage';
    protected static ?string $pluralModelLabel = 'Kontaktanfragen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ticket_number')
                    ->label('Ticketnummer')
                    ->disabled(),

                TextInput::make('name')
                    ->label('Name')
                    ->disabled(),

                TextInput::make('email')
                    ->label('E-Mail')
                    ->disabled(),

                TextInput::make('contact_type')
                    ->label('Art')
                    ->disabled(),

                Select::make('priority')
                    ->label('Priorität')
                    ->options([
                        'low' => 'Niedrig',
                        'medium' => 'Mittel',
                        'high' => 'Hoch',
                        'urgent' => 'Dringend',
                    ])
                    ->disabled(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'offen' => 'Offen',
                        'erledigt' => 'Erledigt',
                    ])
                    ->native(false), // Kein badge oder color hier!

                Textarea::make('message')
                    ->label('Nachricht')
                    ->disabled()
                    ->columnSpanFull(),

                Textarea::make('note')
                    ->label('Interne Notiz')
                    ->helperText('Diese Notiz ist nur für dich sichtbar.')
                    ->columnSpanFull(),

                Textarea::make('reply')
                    ->label('Antwort an Nutzer')
                    ->helperText('Beim Speichern wird automatisch eine E-Mail an den Nutzer gesendet.')
                    ->columnSpanFull(),

                FileUpload::make('attachment')
                    ->label('Dateianhang')
                    ->directory('contact-attachments')
                    ->preserveFilenames()
                    ->maxSize(10240)
                    ->downloadable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ticket_number')
                    ->label('Ticket')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('name')
                    ->label('Name'),

                TextColumn::make('email')
                    ->label('E-Mail')
                    ->searchable(),

                TextColumn::make('contact_type')
                    ->label('Art'),

                TextColumn::make('priority')
                    ->label('Priorität')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'low' => 'gray',
                        'medium' => 'info',
                        'high' => 'warning',
                        'urgent' => 'danger',
                    }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'offen' => 'warning',
                        'erledigt' => 'success',
                    }),

                TextColumn::make('created_at')
                    ->label('Eingegangen')
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('priority')
                    ->label('Priorität')
                    ->options([
                        'low' => 'Niedrig',
                        'medium' => 'Mittel',
                        'high' => 'Hoch',
                        'urgent' => 'Dringend',
                    ]),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'offen' => 'Offen',
                        'erledigt' => 'Erledigt',
                    ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'create' => Pages\CreateContactMessage::route('/create'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
