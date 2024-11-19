import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import vue from '@vitejs/plugin-vue';
import ziggy from 'vite-plugin-ziggy';

export default defineConfig({
    resolve: {
        alias: {
            '@': '/resources/js',
            '@assets': '/public/',
            'ziggy-js': path.resolve('vendor/tightenco/ziggy')
        },
    },
    
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
});
