<?php

namespace App\Filament\Widgets;

use App\Services\StatisticsService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $stats = app(StatisticsService::class);
        $jobStats = $stats->getJobPostsStats();
        $applicationStats = $stats->getApplicationsStats();
        $userStats = $stats->getUsersStats();

        return [
            Stat::make(__('Total Job Posts'), $jobStats['total'])
                ->description(__('All posted jobs'))
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success'),
            Stat::make(__('Open Jobs'), $jobStats['open'])
                ->description(__('Currently active jobs'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info'),
            Stat::make(__('Closed Jobs'), $jobStats['closed'])
                ->description(__('Inactive jobs'))
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('warning'),
        ];
    }
} 