<?php

namespace App\Livewire;

use App\Enums\RatingEnum;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class RatingBox extends Component implements HasActions, HasForms
{
    use InteractsWithActions,
        InteractsWithForms;

    public \App\Models\Rating $rating;

    public function editAction(): Action
    {
        return Action::make('edit')
            ->label('Edit')
            ->translateLabel()
            ->color('info')
            ->icon('heroicon-o-pencil')
            ->badge()
            ->form([
                Select::make('rating.rating')
                    ->label('Rating')
                    ->translateLabel()
                    ->options(RatingEnum::getTranslations())
                    ->required()
                    ->default($this->rating->rating),
                Textarea::make('rating.review')
                    ->label('Review')
                    ->translateLabel()
                    ->required()
                    ->default($this->rating->review),
            ])
            ->action(function ($data) {
                $this->validate();

                $this->rating->update([
                    'rating' => $data['rating']['rating'],
                    'review' => $data['rating']['review'],
                ]);

                $this->dispatch('reRender');
            });
    }

    public function deleteAction(): Action
    {
        return Action::make('delete')
            ->label('Delete')
            ->translateLabel()
            ->requiresConfirmation()
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->badge()
            ->action(function () {
                $this->rating->delete();
                $this->dispatch('reRender');
            });
    }

    public function render()
    {
        return view('livewire.rating-box');
    }
}
