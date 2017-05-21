<template>

	<div>

		<div v-for="group in groups">

			<h2 @click="editGroup(group)">{{ group.group_name }}</h2>

			<ul>
				<li v-for="table in group.tables">{{ table.table_name }}</li>
			</ul>
		</div>

		<table-group ref="groupEditor"></table-group>

	</div>

</template>

<script>

    import Vue from "vue";

    import tableGroup from "./TableGroup.vue";

    export default Vue.component('tables', {

        components: {
            tableGroup
        },

        data()
        {
            return {

                groups: [
	                {
	                    id: 1,
	                    group_name: 'group a',
		                tables: [
			                {
			                    table_name: 'table a',
			                },
                            {
                                table_name: 'table b',
                            }
		                ]
	                },
	                {
                        id: 2,
                        group_name: 'group b',
                        tables: [
                            {
                                table_name: 'table a',
                            },
                            {
                                table_name: 'table b',
                            }
                        ]
	                }
                ],

	            editingGroup: false,
            }
        },

        methods: {
	        editGroup(group)
	        {
		        this.$refs.groupEditor.edit(group);
	        }
        },

	    mounted()
	    {

	    }

    });

</script>