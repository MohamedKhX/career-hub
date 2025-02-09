<?php

namespace App\Filament\Recruiter\Resources;

use App\Enums\JobApplicationStateEnum;
use App\Filament\Recruiter\Resources\JobApplicationResource\Pages;
use App\Models\JobApplication;
use App\Traits\HasTranslatedLabels;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid as InfoGrid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class JobApplicationResource extends Resource
{
    use HasTranslatedLabels;

    protected static ?string $model = JobApplication::class;
    protected static ?string $navigationIcon = 'solar-document-text-bold-duotone';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereHas('jobPost', function ($query) {
            $query->where('recruiter_id', Auth::user()->recruiter_id);
        })->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return Color::Rose;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoGrid::make(3)
                    ->schema([
                        InfoSection::make(__('Personal Information'))
                            ->icon('solar-user-id-bold-duotone')
                            ->columnSpan(2)
                            ->schema([
                                InfoGrid::make(3)
                                    ->schema([
                                        TextEntry::make('first_name')
                                            ->label(__('First Name'))
                                            ->icon('solar-user-bold-duotone'),
                                        TextEntry::make('middle_name')
                                            ->label(__('Middle Name')),
                                        TextEntry::make('last_name')
                                            ->label(__('Last Name')),
                                        TextEntry::make('email')
                                            ->label(__('Email'))
                                            ->icon('solar-letter-bold-duotone'),
                                        TextEntry::make('phone')
                                            ->label(__('Phone'))
                                            ->icon('solar-phone-bold-duotone'),
                                        TextEntry::make('date_of_birth')
                                            ->label(__('Date of Birth'))
                                            ->icon('solar-calendar-bold-duotone')
                                            ->date(),
                                    ]),
                            ]),

                        Group::make([
                            InfoSection::make(__('Job Details'))
                                ->schema([
                                    TextEntry::make('jobPost.title')
                                        ->label(__('Job Title'))
                                        ->icon('solar-document-text-bold-duotone'),
                                    TextEntry::make('expected_salary')
                                        ->label(__('Expected Salary'))
                                        ->icon('solar-wallet-money-bold-duotone')
                                        ->money('LYD'),
                                    TextEntry::make('years_of_experience')
                                        ->label(__('Years of Experience'))
                                        ->icon('solar-clock-circle-bold-duotone')
                                        ->suffix(' ' . __('years')),
                                    TextEntry::make('place_of_residence')
                                        ->label(__('Place of Residence'))
                                        ->icon('solar-home-angle-bold-duotone'),
                                ]),
                        ])->columnSpan(1),

                        InfoSection::make(__('Application Details'))
                            ->icon('solar-document-bold-duotone')
                            ->columnSpan(3)
                            ->schema([
                                TextEntry::make('cover_letter')
                                    ->label(__('Cover Letter'))
                                    ->markdown()
                                    ->columnSpanFull(),
                            ]),

                        InfoSection::make(__('Attachments'))
                            ->icon('solar-folder-with-files-bold-duotone')
                            ->columnSpan(3)
                            ->schema([
                                RepeatableEntry::make('attachments')
                                    ->label('Attachments')
                                    ->translateLabel()
                                    ->schema([
                                        TextEntry::make('file_name')
                                            ->label('File Name')
                                            ->translateLabel()
                                            ->limit(30),

                                        TextEntry::make('size')
                                            ->label('Size')
                                            ->translateLabel()
                                            ->formatStateUsing(fn ($state) => round($state / 1048576, 2)),

                                        TextEntry::make('mime_type')
                                            ->label('Type')
                                            ->translateLabel(),

                                        TextEntry::make('')
                                            ->label('Link')
                                            ->translateLabel()
                                            ->formatStateUsing(fn ($state) => __('Click To Download'))
                                            ->url(fn($record) => $record->getUrl(), true),
                                    ])
                                    ->columns(2)
                                    ->columnSpan(4),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                JobApplication::whereHas('jobPost', function ($query) {
                    $query->where('recruiter_id', Auth::user()->recruiter_id);
                })
            )
            ->columns([
                TextColumn::make('jobPost.title')
                    ->label('Job Title')
                    ->translateLabel()
                    ->icon('solar-document-text-bold-duotone')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Applicant')
                    ->translateLabel()
                    ->icon('solar-user-bold-duotone')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->translateLabel()
                    ->icon('solar-letter-bold-duotone')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->translateLabel()
                    ->icon('solar-phone-bold-duotone')
                    ->searchable(),

                TextColumn::make('expected_salary')
                    ->label('Expected Salary')
                    ->translateLabel()
                    ->icon('solar-wallet-money-bold-duotone')
                    ->money('LYD')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Applied At')
                    ->translateLabel()
                    ->icon('solar-calendar-bold-duotone')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('state')
                    ->label('State')
                    ->translateLabel()
                    ->icon('solar-sort-outline')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state->translate()),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('state')
                    ->label('State')
                    ->translateLabel()
                    ->options(JobApplicationStateEnum::getTranslations()),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('from')
                                    ->label(__('Applied From')),
                                DatePicker::make('until')
                                    ->label(__('Applied Until')),
                            ]),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Action::make('reject')
                    ->label('Reject')
                    ->translateLabel()
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('solar-zip-file-bold')
                    ->hidden(fn ($record) => $record->state != JobApplicationStateEnum::Pending)
                    ->action(function ($record) {
                        $record->update(['state' => JobApplicationStateEnum::Rejected]);


                    })
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('10s');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobApplications::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
