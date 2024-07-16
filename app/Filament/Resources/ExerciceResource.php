<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Exercice;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ExerciceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ExerciceResource\RelationManagers;

class ExerciceResource extends Resource
{
    protected static ?string $model = Exercice::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $navigationLabel = 'Exercice';

    protected static ?string $modelLabel = 'Exercice';

    protected static ?string $navigationGroup = 'Gestion des Evaluations';

    protected static ?int $navigationSort = 2;

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
                Forms\Components\Select::make('lesson_id')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->relationship('lesson','name'),
                Forms\Components\Select::make('evaluation_id')
                    ->searchable()
                    ->preload()
                    ->relationship('evaluation','name'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->numeric(),
                Forms\Components\MarkdownEditor::make('content')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('options'),
                Forms\Components\MarkdownEditor::make('correct_answer')
                    ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lesson.title')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('poster'),
                Tables\Columns\TextColumn::make('evaluation.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('correct_answer')
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
            'index' => Pages\ListExercices::route('/'),
            'create' => Pages\CreateExercice::route('/create'),
            'edit' => Pages\EditExercice::route('/{record}/edit'),
        ];
    }
}
