import { wayfinder } from '@laravel/vite-plugin-wayfinder';
import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';



export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.tsx'],
            ssr: 'resources/js/ssr.tsx',
            refresh: true,
        }),
        react({
            babel: {
                plugins: ['babel-plugin-react-compiler'],
            },
        }),
        tailwindcss(),
        wayfinder({
             command: process.env.NODE_ENV === 'production' 
        ? 'true'  // runs harmless echo in production
        : 'php artisan wayfinder:generate --with-form', // runs normally locally
    
            formVariants: true,
        
        }),
     
    ],
    esbuild: {
        jsx: 'automatic',
    },

    
});
