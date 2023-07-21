module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/tw-elements/dist/js/**/*.js',
    ],
    theme: {
        extend: {
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
                montserrat: [
                    'Montserrat',
                    'sans-serif'
                ]
            },

            colors: {
                blue: {
                    light: '#c2f2fd',
                    DEFAULT: '#007fcc'
                },
                orange: {
                    light: '#fff0d2',
                    DEFAULT: '#efb740'
                },
                pink: {
                    light: '#f9edfc',
                    DEFAULT: '#e290f6'
                }
            }
        }
    },
    plugins: [
        require('tw-elements/dist/plugin'),
    ],
}
