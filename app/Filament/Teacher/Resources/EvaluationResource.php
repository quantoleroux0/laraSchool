<?php

namespace App\Filament\Teacher\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Evaluation;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EvaluationResource\Pages;
use App\Filament\Resources\EvaluationResource\RelationManagers;

class EvaluationResource extends Resource
{
    protected static ?string $model = Evaluation::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static ?string $navigationLabel = 'Evaluation';

    protected static ?string $modelLabel = 'Evaluation';

    protected static ?string $navigationGroup = 'Gestion des Evaluations';

    protected static ?int $navigationSort = 1;
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('poster')->schema([
                    FileUpload::make('image')
                        ->multiple()
                        ->maxFiles(5)
                        ->directory('Evalution_poster')
                        ->reorderable()
                        ->image(),
                ]),
                Forms\Components\Select::make('matiere_id')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->relationship('matiere','name'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('matiere.title')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('poster'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('poster')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvaluations::route('/'),
            'create' => Pages\CreateEvaluation::route('/create'),
            'edit' => Pages\EditEvaluation::route('/{record}/edit'),
        ];
    }
}
