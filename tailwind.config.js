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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'gold-50': "#f8f5ee",
                'gold-100': "#ede6d4",
                'gold-200': "#ddcdab",
                'gold-300': "#caad7a",
                'gold-400': "#bc955b",
                'gold-500': "#ab7e47",
                'gold-600': "#92653c",
                'gold-700': "#764c32",
                'gold-800': "#64402f",
                'gold-900': "#56382d",
                'gold-950': "#311d17",

                'cherry-50': "#fdf4f3",
                'cherry-100': "#fce7e7",
                'cherry-200': "#f9d2d4",
                'cherry-300': "#f3aeb1",
                'cherry-400': "#ec8089",
                'cherry-500': "#e05361",
                'cherry-600': "#cc3249",
                'cherry-700': "#ab253d",
                'cherry-800': "#8a2036",
                'cherry-900': "#7b2036",
                'cherry-950': "#440d18",
            }
        },
    },

    plugins: [forms],
};
