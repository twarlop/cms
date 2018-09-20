<template>

	<div uk-grid>

		<div class="uk-width-auto uk-card uk-card-default">

			<draggable v-model="groups">
				<div v-for="group in groups">

					<h3>
						{{ group.group_name }}
						<span @click.stop="editGroup(group)" uk-icon="icon: pencil"></span>
						<span @click.stop="deleteGroup(group)" uk-icon="icon: trash"></span>
					</h3>

					<draggable v-model="groupedTables[group.id]" class="uk-nav uk-nav-default">
						<div v-for="table in groupedTables[group.id]">
							<router-link :to="{name: 'fields', params:{table: table.id}}">{{ table.table_name }}</router-link>
						</div>
					</draggable>
				</div>
			</draggable>

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

    import draggable from 'vuedraggable'

    import tableGroup from "./TableGroup.vue";
    import api from "../../api";

    export default Vue.component('tables', {

        components: {
            draggable,
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
			'groupedTables',
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