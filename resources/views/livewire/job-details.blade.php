<div>
    @auth
        @if(! auth()->user()->appliedTo($this->record))
            {{ ($this->applyAction)(['viewMode' => true]) }}

        @else
            {{ ($this->applyAction)(['viewMode' => false]) }}
            {{ ($this->cancelApplicationAction) }}
        @endif
    @else
        <div class="flex justify-end">
            <a href="{{ route('login') }}" class="bg-brand-red text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-brand-red-dark">تسجيل الدخول للتقديم</a>
        </div>
    @endauth


    <x-filament-actions::modals />
</div>
