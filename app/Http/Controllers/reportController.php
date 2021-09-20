<?php

namespace App\Http\Controllers;
use App\Exports\bookExport;
use App\Exports\CustomerExport;

use App\Models\Book;
use App\Models\Course;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class reportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function reportAllCustomer()
    {
        return Excel::download(new CustomerExport, 'Customers.xlsx');
    }


    public function reportBookBuy()
    {
        $allBook = Book::all();
        return view('report.reportBookBuy')->with('allBook' , $allBook);
    }

    public function reportCourseShow()
    {
        $allCourse = Course::all();
        return view('report.reportCourseRegister')->with('allCourse' , $allCourse);
    }

    public function reportBookBuyEx(Request $request)
    {
        $bookName = $request->bookName;
        return Excel::download(new bookExport($bookName), 'CustomersBooks.xlsx');


    }
    public function reportCourse(Request $request)
    {
        $courseId = $request->course_id;
        $allCustomer = DB::table('customers')
            ->join('user_courses', 'customers.id', '=', 'user_courses.customer_id')
            ->where('user_courses.course_id' , '=' , $courseId)
            ->select('customers.*','user_courses.*')
            ->get();
        return Excel::download(new bookExport($allCustomer), 'CustomersCourse.xlsx');
    }
}
