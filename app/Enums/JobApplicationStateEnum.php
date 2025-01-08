<?php

namespace App\Enums;

use App\Traits\Enum;

enum JobApplicationStateEnum: string
{
    use Enum;

    case Pending = 'Pending';
    case Accepted = 'Accepted';
    case Rejected = 'Rejected';
}
