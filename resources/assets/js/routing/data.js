import store from "../store";

export default [

    {
        path: '/admin/data',
        name: 'data',
        component: require('./../components/Data/Tables.vue'),

        children: [
            {
                path: '/admin/data/:table/fields',
                name: 'fields',
                component: require('./../components/Data/Fields.vue'),
                props: (route) => {
                    return {
                        table: store.getters['data/tableById'](_.toInteger(route.params.table)),
                    }
                },
            },
        ]
    },

];