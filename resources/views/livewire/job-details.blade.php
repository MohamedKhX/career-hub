<div>
    @if(! auth()->user()->appliedTo($this->record))
        {{ ($this->applyAction)(['viewMode' => true]) }}

    @else
        {{ ($this->applyAction)(['viewMode' => false]) }}
        {{ ($this->cancelApplicationAction) }}
    @endif

    <x-filament-actions::modals />
</div>
