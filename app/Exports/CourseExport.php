<?php

namespace App\Exports;

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class CourseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($courseId)
    {
        $this->courseId = $courseId;
    }
    public function collection()
    {
        $allCustomer = DB::table('customers')
            ->join('user_courses', 'customers.id', '=', 'user_courses.customer_id')
            ->where('user_courses.course_id' , '=' , $this->courseId)
            ->select('customers.*','user_courses.*')
            ->get();
        return $allCustomer;
    }
}
