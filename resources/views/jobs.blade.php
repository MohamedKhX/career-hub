<x-app-layout>
    @push('styles')
        <style>
            .hero {
                min-height: 100vh !important;
            }
        </style>
    @endpush
    <livewire:jobs-table/>
</x-app-layout>
