module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/tw-elements/dist/js/**/*.js',
    ],
    safelist: [
        'bg-lime-600/5',
        'bg-orange-600/5',
        'bg-rose-600/5',
        'text-lime-600',
        'text-orange-600',
        'text-rose-600',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [
                    'Montserrat',
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
            },
            colors: {
                'qbixx-gray': {
                  500: '#575F65',
                },
                'blue': {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#4299e1",
                    500: "#2b6cb0",
                    600: "#249EEA",
                    700: "#127aba",
                    800: "#1e40af",
                    900: "#1e3a8a"
                },
              },
        },
    },
    plugins: [
        require('tw-elements/dist/plugin'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms'),
    ],
}
