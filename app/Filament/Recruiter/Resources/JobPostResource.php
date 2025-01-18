<?php

namespace App\Filament\Recruiter\Resources;

use App\Enums\JobPostStateEnum;
use App\Enums\JobTypeEnum;
use App\Filament\Recruiter\Resources\JobPostResource\Pages;
use App\Filament\Recruiter\Resources\JobPostResource\RelationManagers;
use App\Models\City;
use App\Models\Industry;
use App\Models\JobPost;
use App\Traits\HasTranslatedLabels;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class JobPostResource extends Resource
{
    use HasTranslatedLabels;

    protected static ?string $model = JobPost::class;

    protected static ?string $navigationIcon = 'solar-pen-new-round-bold-duotone';

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


                        Textarea::make('short_description')
                            ->label('Short Description')
                            ->translateLabel()
                            ->required()
                            ->columnSpan('full'),

                        RichEditor::make('description')
                            ->label('Description')
                            ->translateLabel()
                            ->required()
                            ->columnSpan('full'),

                        /*SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->translateLabel()
                            ->collection('thumbnail')
                            ->columnSpan('full'),*/

                        TextInput::make('from_salary')
                            ->label('From Salary')
                            ->translateLabel()
                            ->suffixIcon('solar-wallet-money-bold-duotone') ,

                        TextInput::make('to_salary')
                            ->label('To Salary')
                            ->translateLabel()
                            ->suffixIcon('solar-wallet-money-bold-duotone') ,

                        Select::make('job_type')
                            ->label('Job Type')
                            ->translateLabel()
                            ->options(JobTypeEnum::getTranslations())
                            ->required()
                            ->suffixIcon('solar-palette-round-line-duotone')
                            ->columnSpan('full'),

                        Select::make('industry_id')
                            ->label('Industry')
                            ->translateLabel()
                            ->options(Industry::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->searchable()
                            ->suffixIcon('solar-layers-minimalistic-bold-duotone')
                            ->columnSpan('full'),

                        Select::make('city_id')
                            ->label('City')
                            ->translateLabel()
                            ->options(City::all()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->required()
                            ->suffixIcon('solar-city-bold-duotone')
                            ->columnSpan('full'),


                        Forms\Components\Hidden::make('recruiter_id')
                            ->default(auth()->user()->recruiter_id)
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
                    ->description(fn($record) => str($record->short_description)->words(30)),

                TextColumn::make('state')
                    ->label('State')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->color(fn ($state): string => match ($state) {
                        JobPostStateEnum::Open => 'success',
                        JobPostStateEnum::Closed => 'danger',
                    })
                    ->badge(),

                TextColumn::make('from_salary')
                    ->label('From Salary')
                    ->translateLabel()
                    ->suffix(' د.ل'),

                TextColumn::make('to_salary')
                    ->label('To Salary')
                    ->translateLabel()
                    ->suffix(' د.ل'),

                TextColumn::make('job_type')
                    ->label('Job Type')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
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
                    ->color('teal')
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('recruiter_id', auth()->user()->recruiter->id);
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
