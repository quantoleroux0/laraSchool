<?php

namespace App\Filament\Teacher\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Matiere;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MatiereResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MatiereResource\RelationManagers;

class MatiereResource extends Resource
{
    protected static ?string $model = Matiere::class;

    protected static ?string $navigationIcon = 'heroicon-o-variable';

    protected static ?string $navigationLabel = 'Matiere';

    protected static ?string $modelLabel = 'Matiere';

    protected static ?string $navigationGroup = 'Gestion des Cours';

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
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                    
                ImageColumn::make('poster'),

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
            'index' => Pages\ListMatieres::route('/'),
            'create' => Pages\CreateMatiere::route('/create'),
            'edit' => Pages\EditMatiere::route('/{record}/edit'),
        ];
    }
}
