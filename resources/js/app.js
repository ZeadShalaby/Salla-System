import "./bootstrap";
import { createApp } from "vue";
import router from "./router";

const app = createApp({});

import appVue from "./components/app.vue";
import nav from "./components/nav.vue";

app.component("app-component", appVue);
app.component("nav-component", nav);

app.use(router).mount("#app");
