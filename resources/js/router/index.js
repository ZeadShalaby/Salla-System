import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home.vue";
import NotFound from "../components/NotFound.vue";
import product from "../components/product.vue";

const routes = [
    {
        path: "/",
        component: Home,
    },
    {
        path: "/product",
        component: product,
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFound,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
