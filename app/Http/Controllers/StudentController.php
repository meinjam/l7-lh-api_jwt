<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|min:3|max:25',
            'phone' => 'required|min:9|max:14|unique:students',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:6|max:25',
            'photo' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ];
        $this->validate($request, $rules);

        $student = new Student;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->photo = $request->photo;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->save();
        return response()->json(['Success' => 'Student added successfully.']);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['Success' => 'Student deleted successfully.']);
    }
}
