<?php namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class CoreTables extends Model
{
    protected $table = 'core_data_tables';

    protected $casts = [
        'table_name' => 'string',
        'table_slug' => 'string',
    ];
}