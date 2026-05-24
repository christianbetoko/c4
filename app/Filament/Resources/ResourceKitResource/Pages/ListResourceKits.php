<?php

namespace App\Filament\Resources\ResourceKitResource\Pages;

use App\Filament\Resources\ResourceKitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;   

class ListResourceKits extends ListRecords
{
    protected static string $resource = ResourceKitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
