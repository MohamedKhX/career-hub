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
                TextColumn::make('title')
                    ->label('Title')
                    ->translateLabel()
                    ->searchable()
                    ->description(fn($record) => $record->short_description),

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
                Filter::make('salary_range')
                    ->form([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('from_salary')
                                    ->label(__('From Salary'))
                                    ->numeric()
                                    ->placeholder('0')
                                    ->suffixIcon('heroicon-m-currency-dollar'),
                                TextInput::make('to_salary')
                                    ->label(__('To Salary'))
                                    ->numeric()
                                    ->placeholder('100000')
                                    ->suffixIcon('heroicon-m-currency-dollar'),
                            ])
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from_salary'],
                                fn (Builder $query, $salary): Builder => $query->where('from_salary', '>=', $salary),
                            )
                            ->when(
                                $data['to_salary'],
                                fn (Builder $query, $salary): Builder => $query->where('to_salary', '<=', $salary),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['from_salary'] ?? null) {
                            $indicators[] = __('Minimum Salary') . ': ' . number_format($data['from_salary']) . ' ' . __('LYD');
                        }
                        if ($data['to_salary'] ?? null) {
                            $indicators[] = __('Maximum Salary') . ': ' . number_format($data['to_salary']) . ' ' . __('LYD');
                        }
                        return $indicators;
                    }),

                SelectFilter::make('job_type')
                    ->label(__('Job Type'))
                    ->options(JobTypeEnum::class)
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

                SelectFilter::make('category')
                    ->label(__('Category'))
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),

                Filter::make('created_at')
                    ->form([
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('posted_from')
                                    ->label(__('Posted From'))
                                    ->placeholder(fn ($state): string => now()->subYear()->format('M d, Y')),
                                DatePicker::make('posted_until')
                                    ->label(__('Posted Until'))
                                    ->placeholder(fn ($state): string => now()->format('M d, Y')),
                            ]),

                    ])
                    ->columnSpan(1)
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['posted_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['posted_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['posted_from'] ?? null) {
                            $indicators[] = __('Posted from') . ': ' . $data['posted_from'];
                        }
                        if ($data['posted_until'] ?? null) {
                            $indicators[] = __('Posted until') . ': ' . $data['posted_until'];
                        }
                        return $indicators;
                    }),
            ])
            ->filtersFormColumns(3)
            ->filtersLayout(FiltersLayout::AboveContent)
            ->actions([
                Action::make('view')
                    ->label('View')
                    ->translateLabel()
                    ->color(Color::Rose)
                    ->icon('solar-eye-bold-duotone')
                    ->url(fn($record) => route('job-details', ['jobPost' => $record->id]), shouldOpenInNewTab: true),
            ])
            ->recordUrl(fn($record) => route('job-details', ['jobPost' => $record->id]), shouldOpenInNewTab: true);
    }

    public function render()
    {
        return view('livewire.jobs-table');
    }
}
