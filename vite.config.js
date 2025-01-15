import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css'
            ],
            content: [
                './resources/views/home.blade.php',
                './resources/views/jobs.blade.php',
                './resources/views/layouts/app.blade.php',
                './resources/views/livewire/jobs-table.blade.php',

            ],
            refresh: true,
        }),
    ],
});
