<?php

namespace App\Filament\Resources\CooperationRequestResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class RepliesRelationManager extends RelationManager
{
    protected static string $relationship = 'replies';

    public function form(Form $form): Form
    {
        return $form->schema([
            Textarea::make('message')->required()->label('Antwort'),
            FileUpload::make('attachment_path')
                ->label('Anhang')
                ->directory('cooperation_replies')
                ->acceptedFileTypes(['application/pdf', 'image/*']),
        ]);
    }

    public function table(Table $table): Table // ✅ richtig
    {
        return $table->columns([
            TextColumn::make('message')->wrap()->label('Antwort'),
            TextColumn::make('created_at')->dateTime('d.m.Y H:i')->label('Datum'),
            TextColumn::make('attachment_path')->label('Anhang'),
        ]);
    }
}
