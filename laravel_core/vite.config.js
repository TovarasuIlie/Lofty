import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import VitePluginBrowserSync from 'vite-plugin-browser-sync';
 
export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        [VitePluginBrowserSync({
            dev: {
                bs: {
                  ui: {
                    port: 8000
                  },
                  notify: false
                }
              }
        })]
    ],
});