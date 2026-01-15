import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: ['resources/css/style.css', 'resources/css/app.css', 'resources/js/app.js'],
=======
            input: ['resources/css/utilities.css', 'resources/css/style.css', 'resources/css/app.css', 'resources/js/app.js'],
>>>>>>> 219c0bdd56f9313a1f0ca983213b6bbf20a6fa5d
            refresh: true,
        }),
        tailwindcss(),
    ],
});
