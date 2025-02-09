<?php

namespace App\Filament\Recruiter\Widgets;

use App\Enums\JobApplicationStateEnum;
use App\Models\JobApplication;
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

   /*     $pendingApplications = JobApplication::where('recruiter_id', auth()->user()->recruiter->id)->where('state', JobApplicationStateEnum::Pending)->count();
        $acceptedApplications = JobApplication::where('recruiter_id', auth()->user()->recruiter->id)->where('state', JobApplicationStateEnum::Accepted)->count();
        $rejectedApplications = JobApplication::where('recruiter_id', auth()->user()->recruiter->id)->where('state', JobApplicationStateEnum::Rejected)->count();
*/

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

          /*  Stat::make(__('Pending Applications'), $pendingApplications)
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
                ->color('danger'),*/
        ];
    }
}
