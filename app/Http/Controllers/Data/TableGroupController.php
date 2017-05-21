<?php namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableGroupController extends Controller
{

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