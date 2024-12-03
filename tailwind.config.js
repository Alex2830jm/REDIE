import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        '../path/to/notyf/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "brown-50"  : "#faf7f2",
                "brown-100" : "#f3ede1",
                "brown-200" : "#e5d8c3",
                "brown-300" : "#d8c4a5", //Color Cafe de Guia
                "brown-400" : "#c29f75",
                "brown-500" : "#b68859",
                "brown-600" : "#a8764e",
                "brown-700" : "#8c5f42",
                "brown-800" : "#724d3a",
                "brown-900" : "#5d4031",
                "brown-950" : "#312019",

                'gold-50'   : "#f8f5ee",
                'gold-100'  : "#ede6d4",
                'gold-200'  : "#ddcdab",
                'gold-300'  : "#caad7a",
                'gold-400'  : "#bc955b",// Color Oro de Guia
                'gold-500'  : "#ab7e47",
                'gold-600'  : "#92653c",
                'gold-700'  : "#764c32",
                'gold-800'  : "#64402f",
                'gold-900'  : "#56382d",
                'gold-950'  : "#311d17",

                'cherry-50' : "#fdf4f3",
                'cherry-100': "#fce8e7",
                'cherry-200': "#f9d2d4",
                'cherry-300': "#f3aeb1",
                'cherry-400': "#ec8088",
                'cherry-500': "#e05360",
                'cherry-600': "#cc3248",
                'cherry-700': "#ab253b",
                'cherry-800': "#8a2035", //Color Guinda de Guia
                'cherry-900': "#7b2035",
                'cherry-950': "#440d18",
            }
        },
    },

    flyonui: {
        vendors: true
    },

    plugins: [forms],
};
