<?php

namespace App\Enums;

use App\Traits\Enum;

enum JobPostStateEnum: string
{
    use Enum;

    case Open = 'open';
    case Closed = 'closed';
}
