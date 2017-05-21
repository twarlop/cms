<?php namespace App\Http\Controllers\Data;

use App\Data\CoreFields;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($table)
    {
        return CoreFields::where('table_id', $table)->get();
    }

}