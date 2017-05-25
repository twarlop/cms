<template>

	<div>

		<div v-for="group in groups">

			<h2 @click="editGroup(group)">{{ group.group_name }}</h2>

			<ul>
				<li v-for="table in tablesByGroup(group)"><router-link :to="{name: 'fields', params:{id: table.id}}">{{ table.table_name }}</router-link></li>
			</ul>
		</div>

		<table-group ref="groupEditor"></table-group>

		<router-view></router-view>

	</div>

</template>

<script>

    import Vue from "vue";
    import {mapGetters} from "vuex";

    import tableGroup from "./TableGroup.vue";

    export default Vue.component('tables', {

        components: {
            tableGroup
        },

        data()
        {
            return {
	            editingGroup: false,
            }
        },

		computed: Object.assign({}, mapGetters('data', [
            'groups',
			'tablesByGroup'
        ])),

        methods: {
	        editGroup(group)
	        {
		        this.$refs.groupEditor.edit(group);
	        }
        },

    });

</script>