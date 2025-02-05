<?php

namespace App\Filament\Admin\Resources\RecruiterResource\Pages;

use App\Filament\Admin\Resources\RecruiterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ViewRecord;

class ViewRecruiter extends ViewRecord
{
    protected static string $resource = RecruiterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
