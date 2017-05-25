<?php namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class CoreField extends Model
{
    protected $table = 'core_data_fields';

    protected $casts = [
        'table_id' => 'integer',
        'field_name' => 'string',
        'field_slug' => 'string',
        'field_type' => 'string',
        'field_settings' => 'array',
    ];

    protected $guarded = [
        'field_slug',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['field_name'] = $value;
        $this->attributes['field_slug'] = str_slug($value, '_');
    }

    public function setSlugAttribute($value)
    {
        throw new \Exception("You shouldn't set the slug manually");
    }
}