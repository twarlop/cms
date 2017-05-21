import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

import auth from "./modules/auth";
import data from "./modules/data";

export default new Vuex.Store({

    modules: {
        auth,
        data,
    }

});