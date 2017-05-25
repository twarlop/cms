export default [

    {
        path: '/admin/data',
        name: 'data',
        component: require('./../components/Data/Tables.vue'),

        children: [
            {
                path: '/admin/data/:id/fields',
                name: 'fields',
                component: require('./../components/Data/Fields.vue')
            },
        ]
    },

];