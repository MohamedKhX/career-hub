<?php

namespace App\Enums;

use App\Traits\Enum;

enum UserTypeEnum: string
{
    use Enum;

    case Admin = 'admin';
    case Recruiter = 'recruiter';
    case JobSeeker = 'job seeker';
}
