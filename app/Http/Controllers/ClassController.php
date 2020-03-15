<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
    public function index()
    {
        $class = DB::table('classes')->get();
        return response()->json($class);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'classname' => 'required|min:3|max:255|unique:classes',
        ];
        $this->validate($request, $rules);

        $data = array();
        $data['classname'] = $request->classname;
        DB::table('classes')->insert($data);
        return response('done');
    }

    public function show($id)
    {
        $class = DB::table('classes')->where('id', $id)->first();
        return response()->json($class);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['classname'] = $request->classname;
        DB::table('classes')->where('id', $id)->update($data);
        return response('updated');
    }

    public function destroy($id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return response('deleted');
    }
}
