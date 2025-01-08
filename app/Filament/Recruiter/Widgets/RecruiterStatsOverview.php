<?php

namespace App\Filament\Recruiter\Widgets;

use App\Services\RecruiterStatisticsService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RecruiterStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $stats = app(RecruiterStatisticsService::class);
        $jobStats = $stats->getJobPostsStats();
        $applicationStats = $stats->getApplicationsStats();

        return [
            Stat::make(__('Your Job Posts'), $jobStats['total'])
                ->description(__('Total jobs posted'))
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success'),
            Stat::make(__('Active Jobs'), $jobStats['open'])
                ->description(__('Currently open positions'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info'),
            Stat::make(__('Total Applications'), $applicationStats['total'])
                ->description(__('Applications received'))
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning'),
        ];
    }
} 