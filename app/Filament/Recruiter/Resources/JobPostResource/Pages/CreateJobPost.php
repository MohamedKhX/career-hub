<?php

namespace App\Filament\Recruiter\Resources\JobPostResource\Pages;

use App\Filament\Recruiter\Resources\JobPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;
}
