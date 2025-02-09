<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\ApplicationsChart;
use App\Filament\Admin\Widgets\StatsOverview;
use App\Filament\Admin\Widgets\TopCitiesChart;
use App\Filament\Admin\Widgets\UsersChart;
use App\Filament\Widgets\TopCategoriesChart;
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
