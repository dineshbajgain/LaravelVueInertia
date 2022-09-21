import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Components/Shared/Layout.vue'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import 'aos/dist/aos.css'
import AOS from "aos";
createInertiaApp({
  resolve: name => {
    let page = import(`./Pages/${name}.vue`);
    page.layout = Layout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(AOS.init())
      .use(Toast)
      .component('Link',Link)
      .mount(el)
  },
});
InertiaProgress.init({
  color: "red"
});