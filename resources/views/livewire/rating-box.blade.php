<div class="bg-gray-50 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
    <div class="flex justify-between items-start mb-4">
        <div>
            <h5 class="text-xl font-semibold">{{ $rating->user->name }}</h5>
            @if($rating->rating == \App\Enums\RatingEnum::Terrible)
                <span class="inline-block bg-red-700 text-white text-sm px-3 py-1 rounded-full mt-2">سيء جداً</span>
            @elseif($rating->rating == \App\Enums\RatingEnum::Bad)
                <span class="inline-block bg-red-500 text-white text-sm px-3 py-1 rounded-full mt-2">سيء</span>
            @elseif($rating->rating == \App\Enums\RatingEnum::Average)
                <span class="inline-block bg-yellow-400 text-white text-sm px-3 py-1 rounded-full mt-2">متوسط</span>
            @elseif($rating->rating == \App\Enums\RatingEnum::Good)
                <span class="inline-block bg-yellow-500 text-white text-sm px-3 py-1 rounded-full mt-2">جيد</span>
            @elseif($rating->rating == \App\Enums\RatingEnum::Excellent)
                <span class="inline-block bg-green-500 text-white text-sm px-3 py-1 rounded-full mt-2">ممتاز</span>
            @endif
        </div>
        <div class="flex gap-3">
            <div>{{ $this->deleteAction }}</div>
            <div>{{ $this->editAction }}</div>
        </div>
    </div>
    <p class="text-gray-600">{{ $rating->review }}</p>

    <x-filament-actions::modals />
</div>
