<?php

namespace App\Filament\Admin\Resources\RecruiterResource\Pages;

use App\Enums\UserTypeEnum;
use App\Filament\Admin\Resources\RecruiterResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRecruiter extends CreateRecord
{
    protected static string $resource = RecruiterResource::class;
}
