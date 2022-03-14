module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/tw-elements/dist/js/**/*.js'
    ],
    theme: {
        extend: {
            colors: {
                blue: {
                    100: '#ebf8ff',
                    200: '#bcdefa',
                    300: '#6cb2eb',
                    400: '#63b3ed',
                    500: '#249eea',
                    600: '#127aba',
                    700: '#2b6cb0',
                    800: '#2c5282',
                    900: '#2a4365',
                },
            },
            fontFamily: {
                sans: [
                    'Nunito',
                    '-apple-system',
                    'BlinkMacSystemFont',
                    '"Segoe UI"',
                    'Roboto',
                    '"Helvetica Neue"',
                    'Arial',
                    '"Noto Sans"',
                    'sans-serif',
                    '"Apple Color Emoji"',
                    '"Segoe UI Emoji"',
                    '"Segoe UI Symbol"',
                    '"Noto Color Emoji"',
                ],
                montserrat: ["Montserrat"]
            },
        },
    },
    plugins: [
        require('tw-elements/dist/plugin'),
        require('@tailwindcss/line-clamp')
    ],
}
