<?php

namespace App\Filament\Admin\Widgets;

use App\Services\StatisticsService;
use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?int $sort = 3;

    public function getHeading(): string
    {
        return __('User Distribution');
    }

    public function getData(): array
    {
        $stats = app(StatisticsService::class);
        $userStats = $stats->getUsersStats();

        return [
            'datasets' => [
                [
                    'data' => array_values($userStats['by_type']),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                    ],
                ],
            ],
            'labels' => array_keys($userStats['by_type']),
        ];
    }

    public function getType(): string
    {
        return 'doughnut';
    }
}
