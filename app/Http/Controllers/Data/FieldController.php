<?php namespace App\Http\Controllers\Data;

use App\Data\CoreField;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    public function index()
    {
        return CoreField::all();
    }

}