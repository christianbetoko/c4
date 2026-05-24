<?php

namespace App\Filament\Resources\ResourceKitResource\Pages;

use App\Filament\Resources\ResourceKitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResourceKit extends EditRecord
{
    protected static string $resource = ResourceKitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
