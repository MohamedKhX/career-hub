<?php

namespace App\Filament\Recruiter\Resources;

use App\Filament\Recruiter\Resources\JobApplicationResource\Pages;
use App\Filament\Recruiter\Resources\JobApplicationResource\RelationManagers;
use App\Models\JobApplication;
use App\Traits\HasTranslatedLabels;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobApplicationResource extends Resource
{
    use HasTranslatedLabels;

    protected static ?string $model = JobApplication::class;

    protected static ?string $navigationIcon = 'solar-streets-navigation-bold-duotone';

    protected static ?int $navigationSort = 2;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel(),

                TextColumn::make('email')
                    ->label('Email')
                    ->translateLabel()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->translateLabel()
                    ->searchable(),

                TextColumn::make('date_of_birth')
                    ->label('Date Of Birth')
                    ->translateLabel()
                    ->date(),

                TextColumn::make('place_of_residence')
                    ->label('Place Of Residence')
                    ->translateLabel()
                    ->searchable(),

                TextColumn::make('years_of_experience')
                    ->label('Years Of Experience')
                    ->translateLabel()
                    ->badge()
                    ->suffix(' سنة')
                    ->searchable(),

                TextColumn::make('expected_salary')
                    ->label('Expected Salary')
                    ->translateLabel()
                    ->badge()
                    ->suffix(' دينار')
                    ->searchable(),

            ])
            ->filters([

            ])
            ->actions([]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobApplications::route('/'),
        ];
    }
}
