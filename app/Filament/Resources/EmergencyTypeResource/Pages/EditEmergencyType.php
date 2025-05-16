<?php

namespace App\Filament\Resources\EmergencyTypeResource\Pages;

use App\Filament\Resources\EmergencyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmergencyType extends EditRecord
{
    protected static string $resource = EmergencyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
