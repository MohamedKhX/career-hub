<?php

namespace App\Filament\Recruiter\Resources;

use App\Filament\Recruiter\Resources\RatingResource\Pages;
use App\Filament\Recruiter\Resources\RatingResource\RelationManagers;
use App\Models\Rating;
use App\Traits\HasTranslatedLabels;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RatingResource extends Resource
{
    use HasTranslatedLabels;
    protected static ?string $model = Rating::class;

    protected static ?string $navigationIcon = 'solar-star-circle-bold-duotone';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('review')
                    ->label('Review')
                    ->translateLabel(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->badge(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRatings::route('/'),
            'create' => Pages\CreateRating::route('/create'),
            'edit' => Pages\EditRating::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
         return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }
}
