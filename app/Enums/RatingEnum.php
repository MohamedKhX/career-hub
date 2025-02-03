<?php

namespace App\Enums;

use App\Traits\Enum;

enum RatingEnum: string
{
    use Enum;
    case Terrible = 'terrible';
    case Bad = 'bad';
    case Average = 'average';
    case Good = 'good';
    case Excellent = 'excellent';
}
