<?php namespace App\Http\Controllers\Data;

use App\Data\CoreField;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        return CoreField::all();
    }

    public function update(Request $request, $field)
    {
        dd($field);
    }

}