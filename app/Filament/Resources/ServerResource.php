<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServerResource\Pages;
use App\Filament\Resources\ServerResource\RelationManagers;
use App\Models\Server;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Select, Textarea, Toggle};
use Filament\Forms\Components\Grid;
use Filament\Forms\Get;
use Closure;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ProgressColumn;

class ServerResource extends Resource
{
    protected static ?string $model = Server::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Servername')
                    ->required(),

                TextInput::make('ip')
                    ->label('IP-Adresse')
                    ->required(),

                TextInput::make('server_id')
                    ->label('Server ID')
                    ->default(fn () => 'IKS' . str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT))
                    ->readOnly(),

                Select::make('mode')
                    ->label('Modus')
                    ->options([
                        'live' => 'Live (automatisch getrackt)',
                        'manual' => 'Manuell',
                    ])
                    ->required()
                    ->reactive(), // ← Wichtig!

                Select::make('status')
                    ->label('Manueller Status')
                    ->options([
                        'online' => 'Online',
                        'error' => 'Fehler',
                        'outage' => 'Ausfall',
                        'maintenance' => 'Wartung',
                    ])
                    ->visible(fn (Get $get) => $get('mode') === 'manual'),

                Textarea::make('maintenance_reason')
                    ->label('Wartungsgrund')
                    ->visible(fn (Get $get) => $get('mode') === 'manual'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('server_id')
                    ->label('Server ID')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-hashtag'),

                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-server'),

                TextColumn::make('ip')
                    ->label('IP-Adresse')
                    ->sortable()
                    ->icon('heroicon-o-globe-alt'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'online',
                        'warning' => 'error',
                        'danger' => 'outage',
                        'purple' => 'maintenance',
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => 'online',
                        'heroicon-o-exclamation-triangle' => 'error',
                        'heroicon-o-x-circle' => 'outage',
                        'heroicon-o-wrench-screwdriver' => 'maintenance',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'online' => '🟢 Online',
                        'error' => '⚠️ Fehler',
                        'outage' => '🔴 Ausfall',
                        'maintenance' => '🔧 Wartung',
                    }),

                TextColumn::make('uptime')
                    ->label('Uptime')
                    ->formatStateUsing(function ($state) {
                        $percentage = number_format($state, 2);
                        $color = match (true) {
                            $percentage >= 99 => 'bg-green-500',
                            $percentage >= 95 => 'bg-yellow-500',
                            default => 'bg-red-500',
                        };

                        return <<<HTML
            <div class="flex items-center">
                <div class="w-16 h-2 bg-gray-700 rounded-full mr-2">
                    <div class="h-2 rounded-full $color" style="width: {$percentage}%"></div>
                </div>
                <span class="text-sm text-gray-300">{$percentage}%</span>
            </div>
        HTML;
                    })
                    ->html()
                    ->sortable(),

                BadgeColumn::make('mode')
                    ->label('Modus')
                    ->colors([
                        'primary' => 'live',
                        'gray' => 'manual',
                    ])
                    ->icons([
                        'heroicon-o-cpu-chip' => 'live',
                        'heroicon-o-adjustments-horizontal' => 'manual',
                    ])
                    ->formatStateUsing(fn (string $state): string => $state === 'live' ? 'Automatisch' : 'Manuell'),

                TextColumn::make('last_checked_at')
                    ->label('Letzte Prüfung')
                    ->since()
                    ->sortable()
                    ->icon('heroicon-o-clock'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServers::route('/'),
            'create' => Pages\CreateServer::route('/create'),
            'edit' => Pages\EditServer::route('/{record}/edit'),
        ];
    }
}
