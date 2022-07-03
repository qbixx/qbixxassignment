import {createApp, h} from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import {InertiaProgress} from '@inertiajs/progress'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import axios from 'axios'
// import '../css/app.css'; // TODO: import CSS in JS when 'welcome.blade.php would be obsoleted. See https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#importing-your-css-from-your-javascript-entry-points

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

createInertiaApp({
  title: title => `${title} - Qbixx Assignment`,
  resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({el, App, props, plugin}) {
    createApp({render: () => h(App, props)})
      .use(plugin)
      .component('Head', Head)
      .component('Link', Link)
      .mount(el)
  },
})

InertiaProgress.init()
