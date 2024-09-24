import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Import the Vue plugin

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'], // Your entry point
            refresh: true,
        }),
        vue(), // Add the Vue plugin here
    ],
});
