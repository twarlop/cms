<?php namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class CoreTableGroup extends Model
{

    protected $table = 'core_data_table_groups';

    protected $casts = [
        'group_name' => 'string',
    ];

    protected $fillable  = [
        'group_name'
    ];

}