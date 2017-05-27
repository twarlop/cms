let checkingAuthentication = false;

export default {
    namespaced: true,

    state: {

        user: {
            id: null,
        },

    },

    getters: {
        user(state)
        {
            return state.user;
        },
        authenticated(state)
        {
            return state.user.id;
        }
    },

    mutations: {
        login(state, payload)
        {
            state.user = payload.user;
            checkingAuthentication = false;
        },
        logout(state, payload)
        {
            state.user = {id: false};
        }
    },

    actions: {
        CHECK_AUTHENTICATION()
        {
            if(!checkingAuthentication)
            {
                checkingAuthentication = axios.get('/api/user');
            }

            return checkingAuthentication;
        }
    }
}