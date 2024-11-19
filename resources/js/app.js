import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from "ziggy-js";

createInertiaApp({
  resolve: name => {
    //Pada bagian ini akan mencari semua file berektensi .vue
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    //Pada bagian ini Folder aplikasi akan diload secara dinamis
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
})
