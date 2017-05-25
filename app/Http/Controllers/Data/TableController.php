<?php namespace App\Http\Controllers\Data;

use App\Data\CoreTable;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    public function index()
    {
        return CoreTable::all();
    }

}