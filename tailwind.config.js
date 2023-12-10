import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                // 'sans': ['Helvetica', 'Arial', 'sans-serif'],
                // 'display': ['Oswald'],
                // 'body': ['"Open Sans"'],
            },
        },
    },

    plugins: [forms],
};
