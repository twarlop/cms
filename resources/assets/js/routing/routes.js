import VueRouter from "vue-router";

import guard from "./guard";
import data from "./data";

let routes = [
    {
        path: '/login',
        name: 'login',
        component: require('./../components/Auth/Login.vue'),
    },
    {
        path: '/register',
        name: 'register',
        component: require('./../components/Auth/Register.vue'),
    },

    /**
     * need both of these at the bottom, or they will collide with every other route
     * because of the wildcard in our diagram detail route
     */
    {
        path: '/admin',
        name: 'home',
        component: {
            template: '<div>HELLOOOO</div>'
        },
    },

    ...data
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach(guard);

export default router;