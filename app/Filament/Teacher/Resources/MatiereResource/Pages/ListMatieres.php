<?php

namespace App\Filament\Teacher\Resources\MatiereResource\Pages;

use App\Filament\Teacher\Resources\MatiereResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMatieres extends ListRecords
{
    protected static string $resource = MatiereResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
