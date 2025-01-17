<div class="flex items-center gap-2">
    <x-filament::icon
        icon="solar-document-bold-duotone"
        class="h-4 w-4 text-gray-500 dark:text-gray-400"
    />
    
    <a 
        href="{{ $url }}" 
        target="_blank"
        class="text-primary-600 hover:text-primary-500 hover:underline"
    >
        {{ $fileName }}
        <span class="text-sm text-gray-500 dark:text-gray-400">
            ({{ $fileSize }})
        </span>
    </a>
</div> 