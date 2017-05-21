<?php namespace App\Http\Controllers\Data;

use App\Data\CoreTables;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return CoreTables::all();
    }

}