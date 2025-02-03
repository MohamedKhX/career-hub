<?php

namespace App\Livewire;

use App\Enums\RatingEnum;
use App\Models\Recruiter;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Rating extends Component
{
    #[Validate('required|min:3')]
    public $review;
    public $rating = RatingEnum::Average->value;
    public Recruiter $recruiter;

    public function submit(): void
    {
        $this->validate();

        $rating = new \App\Models\Rating();
        $rating->rating = $this->rating;
        $rating->review = $this->review;
        $rating->user_id = auth()->id();
        $rating->recruiter_id = $this->recruiter->id;

        $rating->save();

    }

    public function render()
    {
        $ratings = $this->recruiter->ratings;
        return view('livewire.rating', [
            'ratings' => $ratings
        ]);
    }
}
