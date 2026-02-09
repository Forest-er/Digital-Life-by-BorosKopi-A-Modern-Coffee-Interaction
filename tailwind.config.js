import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Plus Jakarta Sans', 'sans-serif'],
                serif: ['Playfair Display', 'serif'],
            },
            colors: {
                cream: '#F5F1E8',
                sand: '#E5E0D5',
                coffee: '#B8826D',
                dark: '#3D3D3D',
                'brand-cream': '#FAF7F0',
                'brand-beige': '#D8D2C2',
                'brand-primary': '#B17457',
                'brand-dark': '#4A4947',
            }
        },
    },

    plugins: [forms],
};
