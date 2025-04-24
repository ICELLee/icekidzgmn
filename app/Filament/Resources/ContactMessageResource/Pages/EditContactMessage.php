<?php

namespace App\Filament\Resources\ContactMessageResource\Pages;

use App\Filament\Resources\ContactMessageResource;
use App\Mail\ContactReply;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditContactMessage extends EditRecord
{
    protected static string $resource = ContactMessageResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $wasEmpty = empty($this->record->reply);
        $willHaveReply = !empty($data['reply']);

        // Wenn vorher keine Antwort vorhanden war, jetzt aber eine neue – dann Mail senden
        if ($wasEmpty && $willHaveReply) {
            Mail::to($this->record->email)->send(new ContactReply($this->record));
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
