<?php

namespace App\Enums;

use App\Traits\Enum;

enum JobTypeEnum: string
{
    use Enum;
    case FullTime = 'full time';

    case PartTime = 'part time';

    case Freelancer = 'freelancer';
}
