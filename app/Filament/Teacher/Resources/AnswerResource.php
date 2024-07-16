<?php

namespace App\Filament\Teacher\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Answer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AnswerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AnswerResource\RelationManagers;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationLabel = 'Reponse';

    protected static ?string $modelLabel = 'Reponse';

    protected static ?string $navigationGroup = 'Gestion des Evaluations';

    protected static ?int $navigationSort = 3;
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('uploader un fichier')->schema([
                    FileUpload::make('file_answer')
                        ->multiple()
                        ->maxFiles(5)
                        ->label('Fichier')
                        ->directory('Answer_File')
                        ->reorderable(),

                ]),
                Section::make('relation')->schema([

                    Forms\Components\Select::make('exercice_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('exercice','title'),
                    Forms\Components\Select::make('user_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('user','name'),
                    Forms\Components\TextInput::make('selected_option')
                    ->maxLength(255),
                ])->columns(3),
                Forms\Components\MarkdownEditor::make('text_answer')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('exercice.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('selected_option')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_answer')
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
            'index' => Pages\ListAnswers::route('/'),
            'create' => Pages\CreateAnswer::route('/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }
}
