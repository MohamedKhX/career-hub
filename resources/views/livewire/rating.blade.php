<div>
    <section class="mt-16 bg-white shadow-2xl rounded-3xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
        <div class="p-8">
            <h2 class="text-3xl font-bold mb-6 text-center">تقييمات الشركة</h2>
            <div class="space-y-6">
                @foreach($ratings as $rating)
                    <livewire:rating-box :rating="$rating" :key="$rating->id" />
                @endforeach
            </div>

            @auth
                @if(auth()->user()->hasRating($recruiter))
                    <div class="mt-8 text-center">
                        <p class="text-xl font-semibold text-gray-700">لقد قمت بالفعل بتقييم هذه الشركة. شكراً لمشاركة رأيك!</p>
                    </div>
                @else
                    <div class="mt-12 bg-gray-50 rounded-lg p-6">
                        <h3 class="text-2xl font-semibold mb-4">أضف تقييمك</h3>
                        <form wire:submit="submit">
                            <div class="mb-4">
                                <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">التقييم</label>
                                <select id="rating" wire:model="rating" class="w-full p-2 border border-gray-300 rounded-md focus:ring-brand-red focus:border-brand-red">
                                    <option value="{{ \App\Enums\RatingEnum::Terrible->value }}">سيء جداً</option>
                                    <option value="{{ \App\Enums\RatingEnum::Bad->value }}">سيء</option>
                                    <option value="{{ \App\Enums\RatingEnum::Average->value }}">متوسط</option>
                                    <option value="{{ \App\Enums\RatingEnum::Good->value }}">جيد</option>
                                    <option value="{{ \App\Enums\RatingEnum::Excellent->value }}">ممتاز</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="review" class="block text-sm font-medium text-gray-700 mb-2">تعليقك</label>
                                <textarea id="review" wire:model="review" rows="4" class="w-full p-2 border border-gray-300 rounded-md focus:ring-brand-red focus:border-brand-red" placeholder="اكتب تقييمك هنا..."></textarea>
                                <x-input-error :messages="$errors->get('review')" class="mt-2" />
                            </div>
                            <button type="submit" class="w-full bg-brand-red text-white py-2 px-4 rounded-md hover:bg-red-600 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-opacity-50">
                                إرسال التقييم
                            </button>
                        </form>
                    </div>
                @endif
            @else
                <div class="mt-8 text-center">
                    <p class="text-xl font-semibold text-gray-700">يرجى تسجيل الدخول لإضافة تقييمك.</p>
                    <a href="{{ route('login') }}" class="inline-block mt-4 bg-brand-red text-white py-2 px-6 rounded-md hover:bg-red-600 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-opacity-50">
                        تسجيل الدخول
                    </a>
                </div>
            @endauth
        </div>
    </section>
</div>
