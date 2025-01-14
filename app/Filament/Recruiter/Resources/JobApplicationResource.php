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
                //
            ])
            ->filters([
                //
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
