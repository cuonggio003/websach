<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->student_code = $request->student_code;
        $student->email = $request->email;
        $student->address = $request->address;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = $image->store('images', 'public');
            $student->avatar = $path;
        
        }
        $student->phone = $request->phone;
        $student->save();
        $message = "Tạo sinh vien thành công!";
        Session::flash('create-success', $message);
        return redirect()->route('students.index', compact('message'));
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.update', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->student_code = $request->student_code;
        $student->email = $request->email;
        $student->address = $request->address;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $path = $image->store('images', 'public');
            $student->avatar = $path;
        
        }
        $student->phone = $request->phone;

        $student->save();
        $message = "Cập nhật sinh vien thành công!";
        Session::flash('update-success', $message);
        return redirect()->route('students.index', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        $message = "Xóa sinh vien thành công!";
        Session::flash('delete-success', $message);
        return redirect()->route('students.index', compact('message'));
    }
}
