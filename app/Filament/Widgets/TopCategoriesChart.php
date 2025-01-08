<?php

namespace App\Filament\Widgets;

use App\Services\StatisticsService;
use Filament\Widgets\ChartWidget;

class TopCategoriesChart extends ChartWidget
{
    protected static ?int $sort = 4;

    public function getHeading(): string
    {
        return __('Top Job Categories');
    }

    public function getData(): array
    {
        $stats = app(StatisticsService::class);
        $categories = $stats->getTopCategories();

        return [
            'datasets' => [
                [
                    'label' => __('Jobs'),
                    'data' => array_values($categories),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                ],
            ],
            'labels' => array_keys($categories),
        ];
    }

    public function getType(): string
    {
        return 'bar';
    }
} 