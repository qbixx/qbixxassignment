const mix = require('laravel-mix')
const path = require('path')

mix.disableNotifications()
mix.vue()

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources'),
        },
    },
})

if (mix.inProduction()) {
    mix.version()
}

mix.js('resources/js/app.js', 'public/js')

mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
])

if (!mix.inProduction()) {
  mix.sourceMaps()
  mix.browserSync('qbixxassignment.test')
}
