import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css', // TODO: import CSS in JS when 'welcome.blade.php would be obsoleted. See https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#importing-your-css-from-your-javascript-entry-points
            'resources/js/app.js',
        ]),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources'
        }
    }
});
