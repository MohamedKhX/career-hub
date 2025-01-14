<?php

namespace App\Filament\Recruiter\Resources\JobApplicationResource\Pages;

use App\Filament\Recruiter\Resources\JobApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJobApplication extends CreateRecord
{
    protected static string $resource = JobApplicationResource::class;
}
