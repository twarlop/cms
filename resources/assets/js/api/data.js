export default {

    groups: {
        index()
        {
            return axios('/api/data/table-group');
        },

        create(payload)
        {
            return axios.post('/api/data/table-group', payload);
        },

        update(group, payload)
        {
            return axios.update(`/api/data/table-group/${group.id}`, payload);
        }
    },

    tables: {
        index()
        {
            return axios('/api/data/table')
        },

        create(payload)
        {
            return axios.post('/api/data/table', payload);
        },

        update(table, payload)
        {
            return axios.update(`/api/data/table/${table.id}`, payload);
        }
    },

    fields: {
        index()
        {
            return axios('/api/data/field');
        },

        create(payload)
        {
            return axios.post(`/api/data/field`, payload);
        },

        update(field, payload)
        {
            return axios.update(`/api/data/field/${field.id}`, payload);
        }
    },
}