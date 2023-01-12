import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import MainLayout from "./layouts/MainLayout.vue";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");

        const page = await pages[`./Pages/${name}.vue`]();
        // if no default layout, set mainlayout
        page.default.layout = page.default.layout || MainLayout;

        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});