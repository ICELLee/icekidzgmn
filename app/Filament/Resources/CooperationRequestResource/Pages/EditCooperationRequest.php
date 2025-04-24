<?php

namespace App\Filament\Resources\CooperationRequestResource\Pages;

use App\Filament\Resources\CooperationRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCooperationRequest extends EditRecord
{
    protected static string $resource = CooperationRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
