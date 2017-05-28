<template>

    <div>
        <div class="field-canvas" uk-offcanvas="flip: true">
            <div class="uk-offcanvas-bar">

                <form v-form="{form, submit}">

                    <fieldset class="uk-fieldset">

                        <legend class="uk-legend uk-text-center">Field</legend>

                        <form-text v-model="form.field_name" name="field_name" :focus="true"/>

                        <form-select v-model="form.field_type" name="field_type" :options="fieldTypes"/>

                        <div class="uk-margin uk-text-center">
                            <form-submit :form="form" class="uk-width-1-1"/>
                        </div>

                    </fieldset>

                </form>

            </div>
        </div>
    </div>

</template>

<script>

    export default {

        props: {
            field: {
                type: Object,
                required: true,
            },

            table: {
                type: Object,
                required: true
            }
        },

        data()
        {
            return {
                form: new Form(this.field)
            }
        },

        computed:{

            canvas()
            {
                return UIkit.offcanvas('.field-canvas');
            },

            fieldTypes()
            {
                return [
                    {label: 'text', value:'text'},
                    {label: 'textarea', value:'textarea'},
                    {label: 'number', value:'number'},
                    {label: 'price', value:'price'},
                    {label: 'date', value:'date'},
                    {label: 'datetime', value:'datetime'},
                    {label: 'link', value:'link'},
                ];
            }
        },

        methods: {

            close()
            {
                this.$router.push({
                    name: 'fields',
                    params: {
                        table: this.table.id
                    }
                });
            },

            submit()
            {
                this.close();
            }
        },

        mounted()
        {
            $(this.canvas.$el).on('hide', this.close);
            $(this.canvas).trigger('show');
        },

        destroyed()
        {
            $(this.canvas).trigger('hide');
            $(this.canvas.$el).off('hide', this.close);
            this.canvas.$destroy(true);
        }
    }

</script>