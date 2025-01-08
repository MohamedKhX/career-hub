<?php

namespace App\Filament\Widgets;

use App\Services\StatisticsService;
use Filament\Widgets\ChartWidget;

class TopCitiesChart extends ChartWidget
{
    protected static ?int $sort = 5;

    public function getHeading(): string
    {
        return __('Top Cities');
    }

    public function getData(): array
    {
        $stats = app(StatisticsService::class);
        $cities = $stats->getTopCities();

        return [
            'datasets' => [
                [
                    'data' => array_values($cities),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                    ],
                ],
            ],
            'labels' => array_keys($cities),
        ];
    }

    public function getType(): string
    {
        return 'pie';
    }
} 