<template>

	<div>

		<button class="uk-button uk-width-1-1" @click="create">New group</button>

		<full-modal v-if="show" @hide="hide">

			<form v-form="{form, submit}">

				<fieldset class="uk-fieldset">

					<legend class="uk-legend uk-text-center">New Group</legend>

					<form-text v-model="form.group_name" name="group_name" :focus="true"/>

					<div class="uk-margin uk-text-center">
						<form-submit :form="form" class="uk-width-1-1"/>
					</div>

				</fieldset>

			</form>

		</full-modal>

	</div>

</template>

<script>

    import Vue from "vue";
    import api from "../../api";

    let defaults = {
        id: false,
        group_name: '',
    };

    export default Vue.component('table-group', {

        data()
        {
            return {
                form: new Form(defaults),
	            show: false,
            }
        },

        methods: {

            create()
            {
                this.show = true;
                this.form = new Form(defaults);
            },

            edit(group)
            {
                this.show = true;
                this.form = new Form({
	                id: group.id,
	                group_name: group.group_name
                });
            },

            hide()
            {
                this.show = false;
	            this.form.reset();
            },

            submit()
            {
                this.form.submit(api.GROUPS)
                    .then(({data}) => {
                        this.hide();
                        this.$store.commit('data/SAVED_GROUP', {group: data})
                    })
                    .catch(() => {});
            }
        },

	    created()
	    {
	        this.$on('data.edit_group');
	    },

	    destroyed()
	    {
	        this.$off('data.edit_group');
	    }

    });

</script>