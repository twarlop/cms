import api from "../../api";

const state = {

    groups:[],

    tables: [],

    fields: [],

};

const getters = {
    groups:(state) =>
    {
        return state.groups;
    },

    tables:(state) =>
    {
        return state.tables;
    },

    tableById:(state, getters) => (id) => {
        return state.tables.find((table) => {
            return table.id === id;
        });
    },

    tablesByGroup: (state, getters) => (group) => {
        return state.tables.filter((table) => {
            return table.group_id === group.id;
        });
    },

    fields:(state) =>
    {
        return state.fields;
    },

    fieldsByTable: (state, getters) => (table) => {
        return state.fields.filter((field) => {
            return field.table_id === table.id;
        });
    },

    fieldById:(state, getters) => (id) => {
        return state.fields.find((field) => {
            return field.id === id;
        });
    },
};


const mutations = {
    RECEIVE_GROUPS(state, {groups})
    {
        state.groups = groups;
    },

    SAVED_GROUP(state, {group})
    {
        let groups = state.groups.filter((item) => {
            return item.id !== group.id
        });

        groups.push(group);

        state.groups = groups;
    },

    DELETE_GROUP(state, {group})
    {
        state.groups = state.groups.filter((item) => {
            return group.id !== item.id;
        });
    },

    RECEIVE_TABLES(state, {tables})
    {
        state.tables = tables;
    },

    RECEIVE_FIELDS(state, { fields })
    {
        state.fields = fields;
    },
};

const actions = {

    LOAD_GROUPS({commit})
    {
        return axios(api.GROUPS).then(({data}) => {
            commit('RECEIVE_GROUPS', {
                groups: data
            })
        });
    },

    LOAD_TABLES({commit})
    {
        return axios(api.TABLES).then(({data}) => {
            commit('RECEIVE_TABLES', {
                tables: data
            })
        });
    },

    LOAD_FIELDS({commit})
    {
        return axios(api.FIELDS).then(({data}) => {
            commit('RECEIVE_FIELDS', {
                fields: data
            })
        });
    }

};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions,

}