<template>

	<div>

		<ul>

			<li v-for="field in fieldsByTable(tableById($route.params.id))">{{ field.field_name }}</li>

		</ul>

		<router-view></router-view>

	</div>


</template>

<script>

	import {mapGetters} from "vuex";

	export default {
		computed: mapGetters('data', [
		    'fieldsByTable',
			'tableById',
		]),

		ready()
		{
		    return this.$route.curr
		}
	}

</script>