import "./bootstrap";
import { createApp } from "vue";
import router from "./router";

const app = createApp({});

import appVue from "./components/app.vue";
import nav from "./components/nav.vue";
import footer from "./components/footer.vue";

app.component("app-component", appVue);
app.component("nav-component", nav);
app.component("footer-component", footer);

app.use(router).mount("#app");
