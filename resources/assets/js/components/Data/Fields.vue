<template>

	<div>

		<table class="uk-table uk-table-divider uk-table-striped uk-table-hover uk-table-small">
			<caption></caption>
			<thead>
			<tr>
				<th>Name</th>
				<th>Type</th>
			</tr>
			</thead>
			<tbody>
			<tr v-for="field in fieldsByTable(table)" @click="goTo(table, field)">
				<td>{{ field.field_name }}</td>
				<td>{{ field.field_type }}</td>
			</tr>
			</tbody>
		</table>

		<router-view></router-view>

	</div>


</template>

<script>

	import {mapGetters} from "vuex";

	export default {
	    props: {
	        table: {
	            required: true,
				type: Object
			}
		},
		computed: mapGetters('data', [
		    'fieldsByTable',
			'tableById',
		]),

		methods: {
	        goTo(table, field)
			{
			    return this.$router.push({
					name :'field',
					params: {
						table: table.id,
						field: field.id
					}
			    });
			}
		}
	}

</script>