<?php

namespace App\Filament\Teacher\Resources\ExerciceResource\Pages;

use App\Filament\Teacher\Resources\ExerciceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExercices extends ListRecords
{
    protected static string $resource = ExerciceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
