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
    }
};


const mutations = {
    RECEIVE_GROUPS(state, {groups})
    {
        state.groups = groups;
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
        axios('/api/data/table-group').then(({data}) => {
            commit('RECEIVE_GROUPS', {
                groups: data
            })
        });
    },

    LOAD_TABLES({commit})
    {
        axios('/api/data/table').then(({data}) => {
            commit('RECEIVE_TABLES', {
                tables: data
            })
        });
    },

    LOAD_FIELDS({commit})
    {
        axios('/api/data/field').then(({data}) => {
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