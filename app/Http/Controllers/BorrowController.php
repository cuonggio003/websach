<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{

    function index(){
        $borrows = Borrow::all();
        return view('borrows.list', compact('borrows'));
    }

    function create() {
        return view('borrows.add');
    }

    function searchStudent(Request $request){
        $keyword = $request->keyword;
        $students = Student::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('student_code', 'LIKE', '%' . $keyword . '%')
            ->get();
        return response()->json($students);
    }

    function findStudent($id) {
        $student = Student::find($id);
        return response()->json($student);
    }


    function searchBook(Request $request){
        $keyword = $request->keyword;
        $books = Book::where('name', 'LIKE', '%' . $keyword . '%')
            ->get();
        return response()->json($books);
    }

    function findBook($id) {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $borrow = new Borrow();
        $borrow->student_id = $request->student_id;
        $borrow->book_id = $request->book_id;
        $borrow->borrow_date = $request->borrow_date;
        $borrow->borrow_return = $request->borrow_return;
        $borrow->status = 'đang mượn';
        $borrow->save();
        return redirect()->route('borrows.index');
    }


    function edit($id){
        $students = Student::all();
        $books = Book::all();
        $borrows = Borrow::all();
        return view('borrows.update', compact('students', 'books', 'borrows'));
    }


    function update(Request $request){
        
    }
}
