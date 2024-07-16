<?php

namespace App\Filament\Teacher\Resources\ExerciceResource\Pages;

use App\Filament\Teacher\Resources\ExerciceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExercice extends EditRecord
{
    protected static string $resource = ExerciceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
