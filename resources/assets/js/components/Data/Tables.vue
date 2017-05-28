<template>

	<div uk-grid>

		<div class="uk-width-auto uk-card uk-card-default">
			<div v-for="group in groups">

				<h2 @click="editGroup(group)">{{ group.group_name }}<span @click.stop="deleteGroup(group)" uk-icon="icon: trash"></span></h2>

				<ul class="uk-nav uk-nav-default">
					<li v-for="table in tablesByGroup(group)">
						<router-link :to="{name: 'fields', params:{table: table.id}}">{{ table.table_name }}</router-link>
					</li>
				</ul>
			</div>

			<table-group ref="groupEditor"></table-group>

		</div>

		<div class="uk-width-expand">
			<router-view></router-view>
		</div>
	</div>

</template>

<script>

    import Vue from "vue";
    import {mapGetters} from "vuex";

    import tableGroup from "./TableGroup.vue";
    import api from "../../api";

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
	        },

			deleteGroup(group)
			{
			    axios.delete(`${api.GROUPS}/${group.id}`, group).then(() => {
			        this.$store.commit('data/DELETE_GROUP', {group});
				});
			}
        },

    });

</script>