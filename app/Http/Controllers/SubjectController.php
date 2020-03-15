<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'class_id' => 'required',
            'subjectname' => 'required|min:3|max:25|unique:subjects',
            'subjectcode' => 'required|min:3|max:25|unique:subjects',
        ];
        $this->validate($request, $rules);

        $subject = Subject::create($request->all());
        return response()->json($subject);
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->class_id = $request->class_id;
        $subject->subjectname = $request->subjectname;
        $subject->subjectcode = $request->subjectcode;
        $subject->save();
        return response()->json($subject);
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return response()->json($subject);
    }
}
