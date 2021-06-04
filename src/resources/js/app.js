/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Vue from "vue";
import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);
import VueSpinners from "vue-spinners";
Vue.use(VueSpinners);
window.EventBus = new Vue();
window.console.log(window.EventBus);
import HomeIndex from "./components/Home/HomeIndex.vue";
import ProductByCategory from "./components/Home/ProductByCategory.vue";
import ProductDetail from "./components/Home/ProductDetail.vue";
const User = {
    template: "<div>User {{ $route.params.id }}</div>"
};
const router = new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: HomeIndex },
        { path: "/category", component: ProductByCategory },
        { path: "/:id", component: ProductDetail }

        // { path: "/user/", component: User }
    ]
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("example", require("./components/ExampleComponent.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.axios = require("axios").default;

const app = new Vue({
    el: "#app",
    router,
    mounted() {
        console.log("app");
    }
});
