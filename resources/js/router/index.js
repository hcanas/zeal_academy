import { createRouter, createWebHistory } from "vue-router";
import ScholarList from "../views/ScholarList";
import Scholar from "../views/Scholar";

const routes = [
  {
    path: '/',
    alias: '/scholars',
    component: ScholarList,
  },
  {
    path: '/scholar/:address',
    component: Scholar,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
