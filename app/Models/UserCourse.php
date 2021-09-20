<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id',
        'course_id',
        'debt',
        'paid',
    ];
//    public function customers()
//    {
//        return $this->belongsTo(Customer::class);
//    }
//    public function courses()
//    {
//        return $this->belongsTo(Course::class);
//    }
}
