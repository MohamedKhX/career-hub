<?php

namespace App\Filament\Admin\Resources\RecruiterResource\RelationManagers;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function isReadOnly(): bool
    {
        return false;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make()
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->translateLabel()
                            ->required()
                            ->email()
                            ->unique(ignoreRecord: true),

                        Forms\Components\TextInput::make('password')
                            ->label('Password')
                            ->translateLabel()
                            ->required()
                            ->password()
                            ->maxLength(255)
                            ->disabledOn('edit')
                            ->hiddenOn('edit'),

                        Forms\Components\Hidden::make('type')
                            ->default(UserTypeEnum::Recruiter->value),

                        Forms\Components\Hidden::make('recruiter_id')
                            ->default($this->getOwnerRecord()->id),
                    ])->columns(1)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->translateLabel(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->after(function (User $user) {
                    //$user->assignRole('admin');
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Users');
    }

    public static function getRecordLabel(): string
    {
        return __('User');
    }

    public static function getModelLabel(): ?string
    {
        return __('User');
    }

    public static function getPluralModelLabel(): ?string
    {
        return __('Users');
    }
}
