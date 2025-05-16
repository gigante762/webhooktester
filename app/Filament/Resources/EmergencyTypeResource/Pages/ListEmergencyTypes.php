<?php

namespace App\Filament\Resources\EmergencyTypeResource\Pages;

use App\Filament\Resources\EmergencyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmergencyTypes extends ListRecords
{
    protected static string $resource = EmergencyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
