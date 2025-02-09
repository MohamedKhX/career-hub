<?php

namespace App\Livewire;

use App\Enums\JobTypeEnum;
use App\Models\City;
use App\Models\Industry;
use App\Models\JobPost;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
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
use Illuminate\Database\Eloquent\Builder;

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
                ImageColumn::make('')
                    ->defaultImageUrl(fn($record) => $record->recruiter->logo)
                    ->circular()
                    ->size(70),

                TextColumn::make('title')
                    ->label('Title')
                    ->translateLabel()
                    ->searchable()
                    ->description(fn($record) => $record->recruiter->company_name . ' - ' . $record->created_at->diffForHumans()),

                TextColumn::make('job_type')
                    ->label('Job Type')
                    ->translateLabel()
                    ->searchable()
                    ->badge()
                    ->color(Color::Rose)
                    ->formatStateUsing(fn($state) => $state->translate())
                    ->icon('solar-medal-ribbon-star-bold-duotone'),

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
                SelectFilter::make('job_type')
                    ->label(__('Job Type'))
                    ->options(JobTypeEnum::getTranslations())
                    ->multiple()
                    ->searchable()
                    ->preload(),

                SelectFilter::make('city')
                    ->label(__('City'))
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),

                SelectFilter::make('industry')
                    ->label(__('Industry'))
                    ->relationship('industry', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
            ])
            ->filtersFormColumns(3)
            ->filtersLayout(FiltersLayout::AboveContent)
            ->actions([
                Action::make('view')
                    ->label('View')
                    ->translateLabel()
                    ->color(Color::Rose)
                    ->icon('solar-eye-bold-duotone')
                    ->button()
                    ->url(fn($record) => route('job-details', ['jobPost' => $record->id]), shouldOpenInNewTab: true),
            ])
            ->recordUrl(fn($record) => route('job-details', ['jobPost' => $record->id]), shouldOpenInNewTab: true);
    }

    public function render()
    {
        return view('livewire.jobs-table');
    }
}
