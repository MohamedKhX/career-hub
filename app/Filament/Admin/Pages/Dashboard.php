<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Widgets\ApplicationsChart;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\TopCategoriesChart;
use App\Filament\Widgets\TopCitiesChart;
use App\Filament\Widgets\UsersChart;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            ApplicationsChart::class,
            UsersChart::class,
            TopCitiesChart::class,
        ];
    }
}
