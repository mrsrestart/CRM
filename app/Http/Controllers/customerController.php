<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\Customer;
use App\Models\User;
use App\Models\UserCourse;
use http\Env\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;


class customerController extends Controller
{
    public function index()
    {
        $search = \Request::get('search');
        $courseId = \Request::get('courseId');
        $course = Course::all();

        if ($search) {
            $allCustomer = Customer::where('phone', 'like', '%'.$search.'%')
                ->orderBy('created_at')
                ->paginate(20);
            return view('customer.allCustomer')->with([
                'allCustomer'=> $allCustomer,
                'course' => $course,
            ]);

        }
        if($courseId){

            $allCustomer = DB::table('customers')
                ->join('user_courses', 'customers.id', '=', 'user_courses.customer_id')
                ->where('user_courses.course_id' , '=' , $courseId)
                ->select('customers.*','customers.id as customersId','user_courses.*')
                ->get();
            return view('customer.allCustomer')->with([
                'allCustomer'=> $allCustomer,
                'course' => $course,
            ]);
        }
        $allCustomer = Customer::sortable()->orderBy('created_at','DESC')->simplePaginate(10);
        return view('customer.allCustomer')->with([
            'allCustomer'=> $allCustomer,
            'course' => $course,
        ]);





    }

    public function addNewCustomer()
    {
        $bookData = Book::all();
        return view('customer.addNewCustomer')->with('bookData' , $bookData);
    }

    public function createCustomer(Request $request)
    {

        $this->validate($request,[
            'fullName' => 'required',
            'phone' => 'required',
        ]);
        $selectBox = serialize($request->selectedBook);
        Customer::create([
            'name'=>$request->fullName,
            'phone'=>$request->phone,
            'answer'=>$request->answer,
            'buyBook'=>$request->buyBook,
            'inCourse'=>$request->inCourse,
            'inConsult'=>$request->inConsult,
            'needFollow'=>$request->needFollow,
            'selectedBook'=>$selectBox,
            'comment'=>$request->comment,
        ]);
        return redirect('/showAllCustomer');
    }

    public function deleteCustomer($id)
    {
        Customer::find($id)->delete();
        return redirect('/showAllCustomer');

    }

    public function showEditCustomer($id)
    {

        $customerData = Customer::find($id);
        $course = Course::all();
        $userCourse = UserCourse::where('customer_id',$id)->get();

        return view('customer.editCustomer')->with([
            'customerData'=> $customerData,
            'course' => $course,
            'userCourse' => $userCourse
        ]);
    }

    public function editCustomer($id , Request $request)
    {
        Customer::where('id',$id)->update([
            'name'=>$request->fullName,
            'phone'=>$request->phone,
            'answer'=>$request->answer,
            'buyBook'=>$request->buyBook,
            'inCourse'=>$request->inCourse,
            'inConsult'=>$request->inConsult,
            'inDoubt'=>$request->inDoubt,
            'needFollow'=>$request->needFollow,
        ]);
        return redirect('/showAllCustomer');
    }

    public function addCustomerCourse(Request $request)
    {
        $customerId = $request->customerId;
        $courceId = $request->courseId;
        $debt = $request->debt;
        $paid = $request->paid;
        UserCourse::create([
            'customer_id' => $customerId,
            'course_id' => $courceId,
            'debt' => $debt,
            'paid' => $paid,
        ]);
        return redirect('/editCustomer/'.$customerId);

    }

    public function editCustomerCourseView($id)
    {
        $customerData = UserCourse::find($id);
        $course = Course::all();
        return view('customer.editCustomerCourse')->with([
            'customerData'=>$customerData,
            'course'=>$course
        ]);
    }

    public function editCustomerCourse(Request $request,$id)
    {
        $this->validate($request,[
            'course_id' => 'required',
            'debt' => 'required',
            'paid' => 'required',
        ]);

        UserCourse::where('id',$id)->update([
            'course_id' => $request->course_id,
            'debt' => $request->debt,
            'paid' => $request->paid,
        ]);
        return redirect('/editCustomer/'.$request->customerId);
    }
}
