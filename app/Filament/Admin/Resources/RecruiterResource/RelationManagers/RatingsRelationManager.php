<?php

namespace App\Filament\Admin\Resources\RecruiterResource\RelationManagers;

use App\Traits\HasTranslatedLabels;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RatingsRelationManager extends RelationManager
{
    protected static string $relationship = 'ratings';


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('review')
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
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Ratings');
    }

    public static function getRecordLabel(): string
    {
        return __('Rating');
    }

    public static function getModelLabel(): ?string
    {
        return __('Rating');
    }

    public static function getPluralModelLabel(): ?string
    {
        return __('Ratings');
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
