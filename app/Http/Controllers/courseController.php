<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
        $bookData = Course::all();
        return view('course.showAllCourse')->with('bookData' , $bookData);
    }

    public function showAddNewCourse()
    {
        return view('course.newCourse');
    }
    public function addNewCourse(Request $request)
    {
        $this->validate($request , [
            'courseName' => 'required',
            'price' => 'required'
        ]);
        Course::create([
            'courseName' => $request->courseName,
            'comment' => $request->comment,
            'price' => $request->price,
        ]);
        return redirect('/showAllCourse');
    }

    public function showEditCourse($id)
    {
        $courseData = Course::find($id);
        return view('course.editCourse')->with('courseData' , $courseData);
    }
    public function editCourse(Request $request , $id)
    {
        $this->validate($request , [
            'courseName' => 'required',
            'price' => 'required'
        ]);
        Course::where( 'id' ,$id)->update([
            'courseName' => $request->courseName,
            'comment' => $request->comment,
            'price' => $request->price,
        ]);
        return redirect('/showAllCourse');

    }

    public function deleteCourse($id)
    {
        Course::find($id)->delete();
        return redirect('/showAllCourse');
    }
}
