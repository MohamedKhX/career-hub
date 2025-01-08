<?php

namespace App\Filament\Recruiter\Widgets;

use App\Services\RecruiterStatisticsService;
use Filament\Widgets\ChartWidget;

class ApplicationsByStateChart extends ChartWidget
{
    protected static ?int $sort = 4;

    public function getHeading(): string
    {
        return __('Applications by Status');
    }

    public function getData(): array
    {
        $stats = app(RecruiterStatisticsService::class);
        $byState = $stats->getApplicationsByState();

        return [
            'datasets' => [
                [
                    'data' => array_values($byState),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                    ],
                ],
            ],
            'labels' => array_keys($byState),
        ];
    }

    public function getType(): string
    {
        return 'doughnut';
    }
} 