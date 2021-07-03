const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            ...defaultTheme.colors,
            scarlet: {
                100: '#FFEAE9',
                200: '#FFCBC7',
                300: '#FFABA5',
                400: '#FF6C62',
                500: '#FF2D1F',
                600: '#E6291C',
                700: '#991B13',
                800: '#73140E',
                900: '#4D0E09',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Mulish', ...defaultTheme.fontFamily.sans],
                hind: ['Hind', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
