<template>

	<div>

		<ul>

			<li v-for="field in fieldsByTable(table.id)">{{ field.field_name }}</li>

		</ul>

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
	}

</script>