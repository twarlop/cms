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

        return CoreTableGroup::create($request->only([
            'group_name'
        ]));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'group_name' => 'required',
        ]);

        $group = CoreTableGroup::find($id);
        $group->fill($request->only(['group_name']));
        $group->save();

        return $group;
    }

    public function destroy($id)
    {
        $group = CoreTableGroup::find($id);
        $group->delete();
    }

}