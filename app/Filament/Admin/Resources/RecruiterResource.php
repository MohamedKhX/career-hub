<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RecruiterResource\Pages;
use App\Filament\Admin\Resources\RecruiterResource\RelationManagers;
use App\Models\Recruiter;
use App\Traits\HasTranslatedLabels;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecruiterResource extends Resource
{
    use HasTranslatedLabels;

    protected static ?string $model = Recruiter::class;

    protected static ?string $navigationIcon = 'solar-buildings-2-bold-duotone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->heading(__('Recruiter Info'))
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Company Name')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('company_website')
                            ->label('Company Website')
                            ->translateLabel()
                            ->required(),

                        Textarea::make('description')
                            ->label('Description')
                            ->translateLabel()
                            ->minLength(5)
                            ->required(),

                        TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->translateLabel()
                            ->required()
                            ->minLength(10)
                            ->maxLength(10),

                        TextInput::make('address')
                            ->label('Address')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('city')
                            ->label('City')
                            ->translateLabel()
                            ->required(),

                        SpatieMediaLibraryFileUpload::make('logo')
                            ->label('Logo')
                            ->translateLabel()
                            ->collection('logo'),
                    ])
             ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company_name')
                    ->label('Company Name')
                    ->translateLabel()
                    ->description(fn($record) => str($record->description)->words(40))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company_website')
                    ->label('Company Website')
                    ->translateLabel(),

                TextColumn::make('phone_number')
                    ->label('Phone Number')
                    ->translateLabel(),

                TextColumn::make('address')
                    ->label('Address')
                    ->translateLabel(),

                TextColumn::make('city')
                    ->label('City')
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::make()
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecruiters::route('/'),
            'create' => Pages\CreateRecruiter::route('/create'),
            'edit' => Pages\EditRecruiter::route('/{record}/edit'),
        ];
    }
}
