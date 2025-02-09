<?php

namespace App\Filament\Admin\Widgets;

use App\Enums\JobApplicationStateEnum;
use App\Models\JobApplication;
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
        $pendingApplications = JobApplication::where('state', JobApplicationStateEnum::Pending)->count();
        $acceptedApplications = JobApplication::where('state', JobApplicationStateEnum::Accepted)->count();
        $rejectedApplications = JobApplication::where('state', JobApplicationStateEnum::Rejected)->count();

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

            Stat::make(__('Pending Applications'), $pendingApplications)
                ->description(__('Applications awaiting review'))
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make(__('Accepted Applications'), $acceptedApplications)
                ->description(__('Applications that have been accepted'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make(__('Rejected Applications'), $rejectedApplications)
                ->description(__('Applications that have been rejected'))
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
