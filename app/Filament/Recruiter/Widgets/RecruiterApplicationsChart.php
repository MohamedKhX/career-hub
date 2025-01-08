<?php

namespace App\Filament\Recruiter\Widgets;

use App\Services\RecruiterStatisticsService;
use Filament\Widgets\ChartWidget;

class RecruiterApplicationsChart extends ChartWidget
{
    protected static ?int $sort = 2;

    public function getHeading(): string
    {
        return __('Monthly Applications Received');
    }

    public function getData(): array
    {
        $stats = app(RecruiterStatisticsService::class);
        $applicationStats = $stats->getApplicationsStats();

        return [
            'datasets' => [
                [
                    'label' => __('Applications'),
                    'data' => array_values($applicationStats['monthly']),
                ],
            ],
            'labels' => array_keys($applicationStats['monthly']),
        ];
    }

    public function getType(): string
    {
        return 'line';
    }
} 