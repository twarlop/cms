<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_data_tables_group', function(Blueprint $table){
            $table->increments('id');
            $table->string('group_name');
            $table->unique('group_name');
            $table->timestamps();
        });

        Schema::create('core_data_tables', function(Blueprint $table){
            $table->increments('id');
            $table->integer('group_id', false, true)->nullable();
            $table->foreign('group_id', 'core_table_to_group')
                ->references('id')
                ->on('core_data_tables_group')
                ->onDelete('set null');

            $table->string('table_name');
            $table->unique('table_name');
            $table->string('table_slug');
            $table->unique('table_slug');
            $table->timestamps();
        });

        Schema::create('core_data_fields', function(Blueprint $table){
            $table->increments('id');

            $table->integer('table_id', false, true);
            $table->foreign('table_id', 'core_field_to_table')
                ->references('id')
                ->on('core_data_tables')
                ->onDelete('cascade');

            $table->string('field_name');
            $table->string('field_slug');
            $table->string('field_type');
            $table->json('field_settings');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('core_data_fields');
        Schema::drop('core_data_tables');
        Schema::drop('core_data_tables_group');
    }
}
