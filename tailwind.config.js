/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.blade.js"
    ],
    theme: {
        fontFamily: {
            'Lobster': ['Lobster', 'cursive'],
            'Merriweather Sans': ['Merriweather Sans', 'sans-serif']

        }
    },
    plugins: []
}
