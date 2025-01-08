<?php

namespace App\Filament\Recruiter\Resources;

use App\Enums\JobPostStateEnum;
use App\Enums\JobTypeEnum;
use App\Filament\Recruiter\Resources\JobPostResource\Pages;
use App\Filament\Recruiter\Resources\JobPostResource\RelationManagers;
use App\Models\JobPost;
use App\Traits\HasTranslatedLabels;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobPostResource extends Resource
{
    use HasTranslatedLabels;

    protected static ?string $model = JobPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->translateLabel()
                            ->required()
                            ->columnSpan('full'),

                        RichEditor::make('description')
                            ->label('Description')
                            ->translateLabel()
                            ->required()
                            ->columnSpan('full'),

                        TextInput::make('salary')
                            ->label('Salary')
                            ->translateLabel()
                            ->suffixIcon('solar-wallet-money-bold-duotone') ,

                        Select::make('job_type')
                            ->label('Job Type')
                            ->translateLabel()
                            ->options(JobTypeEnum::getTranslations())
                            ->required()
                            ->suffixIcon('solar-palette-round-line-duotone'),

                        Repeater::make('requirements')
                            ->label('Requirements')
                            ->translateLabel()
                            ->simple(
                                TextInput::make('requirement')
                                    ->label('Requirement')
                                    ->translateLabel()
                                    ->required(),
                            )
                            ->minItems(1)
                            ->columnSpan('full'),

                        Select::make('category_id')
                            ->label('Category')
                            ->translateLabel()
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->suffixIcon('solar-notes-minimalistic-bold-duotone'),

                        Select::make('industry_id')
                            ->label('Industry')
                            ->translateLabel()
                            ->relationship('industry', 'name')
                            ->options(JobTypeEnum::getTranslations())
                            ->required()
                            ->searchable()
                            ->suffixIcon('solar-layers-minimalistic-bold-duotone'),

                        Select::make('city_id')
                            ->label('City')
                            ->translateLabel()
                            ->relationship('city', 'name')
                            ->searchable()
                            ->options(JobTypeEnum::getTranslations())
                            ->required()
                            ->suffixIcon('solar-city-bold-duotone')
                            ->columnSpan('full'),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->translateLabel()
                    ->description(fn($record) => str($record->description)->words(30)),

                TextColumn::make('salary')
                    ->label('Salary')
                    ->translateLabel(),

                TextColumn::make('job_type')
                    ->label('Salary')
                    ->translateLabel()
                    ->badge(),

                TextColumn::make('state')
                    ->label('Salary')
                    ->translateLabel()
                    ->badge(),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->translateLabel()
                    ->badge(),

                TextColumn::make('industry.name')
                    ->label('Industry')
                    ->translateLabel(),

                TextColumn::make('city.name')
                    ->label('City')
                    ->translateLabel(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('change_state')
                    ->label('Change State')
                    ->translateLabel()
                    ->color('primary')
                    ->icon('solar-satellite-bold-duotone')
                    ->form([
                        Forms\Components\Select::make('state')
                            ->label('State')
                            ->translateLabel()
                            ->options(JobPostStateEnum::getTranslations())
                            ->required()
                            ->columnSpan('full'),
                    ])
                    ->action(function ($record, $data) {
                        $record->state = $data['state'];
                        $record->save();
                    })
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
            'index' => Pages\ListJobPosts::route('/'),
            'create' => Pages\CreateJobPost::route('/create'),
            'edit' => Pages\EditJobPost::route('/{record}/edit'),
        ];
    }
}
