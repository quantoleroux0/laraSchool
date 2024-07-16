<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Level;
use App\Models\Subscription;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Utilisateurs';

    protected static ?string $modelLabel = 'Utilisateur';

    protected static ?string $navigationGroup = 'Compte Utilisateur';

    protected static ?int $navigationSort = 1;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Section::make('Photo de profile')->schema([
                    FileUpload::make('profile_picture')
                        ->directory('profile_pictures')
                        ->disk('public')
                        ->image(),
                ]),

                Section::make('Compte')->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('phone_number')
                        ->tel()
                        ->maxLength(255),
                    DatePicker::make('birthday'),
                ])->columns(3),

                Section::make('Mot de passe')->schema([
                    TextInput::make('password')
                        ->password()
                        ->required()
                        ->maxLength(255),
                ]),

                Section::make('Privilège')->schema([
                    Toggle::make('is_teacher')
                        ->required(),
                    Toggle::make('is_admin')
                        ->required(),
                    Toggle::make('is_pupil')
                        ->required(),
                ])->columns(3),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('profile_picture'),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Hidden by default
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Hidden by default
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Hidden by default
                IconColumn::make('is_teacher')
                    ->boolean(),
                IconColumn::make('is_admin')
                    ->boolean(),
                IconColumn::make('is_pupil')
                    ->boolean(),
                TextColumn::make('profile_picture')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), // Hidden by default
                TextColumn::make('phone_number')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true), // Hidden by default
                TextColumn::make('birthday')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Hidden by default
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
            // Add relation managers here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}