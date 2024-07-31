/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            '4xl': {min:'1600px'},
            ...defaultTheme.screens,
        },
        extend: {},
    },
    plugins: [],
}

