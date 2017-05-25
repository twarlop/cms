<?php namespace App\Http\Controllers\Data;

use App\Data\CoreTableGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableGroupController extends Controller
{

    public function index()
    {
        return CoreTableGroup::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'group_name' => 'required'
        ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'group_name' => 'required',
        ]);
    }

}