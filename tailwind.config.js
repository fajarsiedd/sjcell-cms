import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    safelist: [
        'text-green-400',
        'bg-green-400',
        'bg-green-100',
        'text-yellow-400',
        'bg-yellow-400',
        'bg-yellow-100',
        'text-red-400',
        'bg-red-400',
        'bg-red-100',
        'text-purple-400',
        'bg-purple-400',
        'bg-purple-100',
        'text-blue-400',
        'bg-blue-400',
        'bg-blue-100',
    ],
};
