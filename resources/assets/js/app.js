import Vue from "vue";
import core from "twarlop-uikit";


/**
 * our shared event dispatcher to communicate between components easily
 * this.$emit or this.$on in a component will only work for dom events.
 * so we can't do parent to child communication, or sibling to sibling.
 */

window.Event = new Vue();
window.Form = core.Form;

/**
 * First we will load all of this project's JavaScript dependencies.
 * It is a great starting point when building robust,
 * powerful web applications using Vue and Laravel.
 */

require('./vendor');

import VueRouter from "vue-router";

//create the store, need to do this after bootstrap, before the router!
import store from "./store/index";

import router from "./routing/routes";

Vue.use(VueRouter);

/**
 * Navigation
 */
import NavigationAuth from "./components/Auth/NavigationAuth.vue"

window.Vue = new Vue({
    el: '#app',
    router,

    store: store,

    directives: [
        ...core.directives
    ],

    components: [

        ...core.components,
        //navigation top
        NavigationAuth,
    ],

    data: {
        booted: false,
    },

    computed: {

        authenticated()
        {
            return this.$store.getters['auth/user'].id;
        }
    },

    created()
    {
        this.$store.dispatch('auth/CHECK_AUTHENTICATION')
            .catch(() => {
                this.booted = true;
            })
            .then(() => {

                if(this.$store.getters['auth/authenticated'])
                {
                    let loaders = [
                        this.$store.dispatch('data/LOAD_GROUPS').catch(() => {
                        }),
                        this.$store.dispatch('data/LOAD_TABLES').catch(() => {
                        }),
                        this.$store.dispatch('data/LOAD_FIELDS').catch(() => {
                        }),
                    ];

                    Promise.all(loaders).then(() => {
                        this.booted = true;
                    });
                }
                else{
                    this.booted = true;
                }
            });
    }
});