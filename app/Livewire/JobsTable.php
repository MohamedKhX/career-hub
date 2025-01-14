<?php

namespace App\Livewire;

use App\Models\JobPost;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Concerns\InteractsWithTableQuery;
use Filament\Tables\Table;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Livewire\Component;

class JobsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithTableQuery;
    use InteractsWithPageFilters;
    use InteractsWithActions, InteractsWithInfolists;

    public function table(Table $table): Table
    {
        return $table
            ->query(JobPost::query())
            ->columns([
                TextColumn::make('title'),
            ]);
    }

    public function render()
    {
        return view('livewire.jobs-table');
    }
}
