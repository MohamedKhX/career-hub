<?php

namespace App\Livewire;

use App\Enums\JobTypeEnum;
use App\Models\City;
use App\Models\Industry;
use App\Models\JobPost;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Concerns\InteractsWithTableQuery;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Livewire\Component;

class JobsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithTableQuery;
    use InteractsWithPageFilters;
    use InteractsWithActions, InteractsWithInfolists;

    public function table(Table $table): Table
    {
        return $table
            ->query(JobPost::query()->where('state', 'open'))
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->translateLabel()
                    ->searchable()
                    ->description(fn($record) => $record->description),

                TextColumn::make('from_salary')
                    ->label('From Salary')
                    ->translateLabel()
                    ->searchable()
                    ->badge()
                    ->color(Color::Teal)
                    ->suffix(' د.ل')
                    ->icon('solar-wallet-money-bold-duotone'),

                TextColumn::make('to_salary')
                    ->label('To Salary')
                    ->translateLabel()
                    ->searchable()
                    ->badge()
                    ->color(Color::Teal)
                    ->suffix(' د.ل')
                    ->icon('solar-wallet-money-bold-duotone'),

                TextColumn::make('job_type')
                    ->label('Job Type')
                    ->translateLabel()
                    ->searchable()
                    ->badge()
                    ->color(Color::Rose)
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->icon('solar-medal-ribbon-star-bold-duotone'),

                TextColumn::make('recruiter.company_name')
                    ->label('Recruiter')
                    ->translateLabel()
                    ->searchable()
                    ->badge()
                    ->color(Color::Blue)
                    ->icon('solar-buildings-2-bold-duotone'),

                TextColumn::make('industry.name')
                    ->label('Industry')
                    ->translateLabel()
                    ->searchable()
                    ->badge()
                    ->color(Color::Indigo)
                    ->icon('solar-ferris-wheel-bold'),

                TextColumn::make('city.name')
                    ->label('City')
                    ->translateLabel()
                    ->searchable()
                    ->badge()
                    ->color(Color::Violet)
                    ->icon('solar-city-bold-duotone'),
            ])
            ->filters([
                Filter::make('Salary Range')
                    ->form([
                        TextInput::make('from_salary')
                            ->label('From Salary')
                            ->numeric()
                            ->placeholder('أقل مرتب'),
                        TextInput::make('to_salary')
                            ->label('To Salary')
                            ->numeric()
                            ->placeholder('أعلى مرتب'),
                    ])
                    ->query(function ($query, $data) {
                        return $query
                            ->when($data['from_salary'], fn ($q, $from) => $q->where('from_salary', '>=', $from))
                            ->when($data['to_salary'], fn ($q, $to) => $q->where('to_salary', '<=', $to));
                    }),

                SelectFilter::make('job_type')
                    ->label('Job Type')
                    ->options(JobTypeEnum::getTranslations())
                    ->placeholder('All Job Types'),

                SelectFilter::make('industry.name')
                    ->label('Industry')
                    ->options(Industry::pluck('name', 'id'))
                    ->placeholder('All Industries'),

                SelectFilter::make('city')
                    ->label('City')
                    ->options(City::pluck('name', 'id'))
                    ->placeholder('All Cities'),
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->actions([
                Action::make('view')
                    ->label('View')
                    ->translateLabel()
                    ->color(Color::Rose)
                    ->icon('solar-eye-bold-duotone')
                    ->url(route('job-details'), shouldOpenInNewTab: true),
            ])
            ->recordUrl(fn($record) => route('job-details'), shouldOpenInNewTab: true);
    }

    public function render()
    {
        return view('livewire.jobs-table');
    }
}
