module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/tw-elements/dist/js/**/*.js',
    ],
    safelist:[
        'bg-blue-300',
        'bg-blue-300',
        'bg-orange-300',
        'bg-pink-300',
        'text-orange-900',
        'text-pink-900'
    ],
    theme: {
        extend: {
            colors: {
                'medium-grey': '#575F65',
                'medium-blue':'#249EEA'
            },
            fontFamily: {
                montserrat: ['Montserrat'],
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
                fontSize:{
                    'text-5xl':'50px'
                }
            },
        },
    },
    plugins: [
        require('tw-elements/dist/plugin'),
        require('@tailwindcss/line-clamp'),
    ],
}
