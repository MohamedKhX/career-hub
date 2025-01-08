<?php

namespace App\Filament\Widgets;

use App\Services\StatisticsService;
use Filament\Widgets\ChartWidget;

class ApplicationsChart extends ChartWidget
{
    protected static ?int $sort = 2;

    public function getHeading(): string
    {
        return __('Monthly Applications');
    }

    public function getData(): array
    {
        $stats = app(StatisticsService::class);
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