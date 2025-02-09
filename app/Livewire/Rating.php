<?php

namespace App\Livewire;

use App\Enums\RatingEnum;
use App\Enums\UserTypeEnum;
use App\Models\Recruiter;
use App\Models\User;
use Filament\Notifications\Notification;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Rating extends Component
{
    #[Validate('required|min:3')]
    public $review;
    public $rating = RatingEnum::Average->value;
    public Recruiter $recruiter;

    protected $listeners = ['reRender'];

    public function reRender()
    {
        $this->render();
    }

    public function submit(): void
    {
        $this->validate();

        $rating = new \App\Models\Rating();
        $rating->rating = $this->rating;
        $rating->review = $this->review;
        $rating->user_id = auth()->id();
        $rating->recruiter_id = $this->recruiter->id;

        $rating->save();

        Notification::make('new-rating')
            ->body(__('New Rating added') . __(' for ') . $this->recruiter->company_name)
            ->success()
            ->sendToDatabase(User::where('type', UserTypeEnum::Admin)->get())
            ->sendToDatabase(User::where('recruiter_id', $this->recruiter->id)->get());
    }

    public function render()
    {
        $ratings = $this->recruiter->ratings;
        return view('livewire.rating', [
            'ratings' => $ratings
        ]);
    }
}
