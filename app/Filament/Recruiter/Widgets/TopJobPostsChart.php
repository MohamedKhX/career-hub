<?php

namespace App\Filament\Recruiter\Widgets;

use App\Services\RecruiterStatisticsService;
use Filament\Widgets\ChartWidget;

class TopJobPostsChart extends ChartWidget
{
    protected static ?int $sort = 3;

    public function getHeading(): string
    {
        return __('Most Popular Job Posts');
    }

    public function getData(): array
    {
        $stats = app(RecruiterStatisticsService::class);
        $topJobs = $stats->getTopJobPosts();

        return [
            'datasets' => [
                [
                    'label' => __('Applications'),
                    'data' => array_values($topJobs),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                ],
            ],
            'labels' => array_keys($topJobs),
        ];
    }

    public function getType(): string
    {
        return 'bar';
    }
} 