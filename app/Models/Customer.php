<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Customer extends Model
{
    use Sortable;
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'answer',
        'buyBook',
        'inCourse',
        'inConsult',
        'inDoubt',
        'needFollow',
        'comment',
        'selectedBook'
    ];

    public $sortable = [ 'name',
        'phone',
        'answer',
        'buyBook',
        'inCourse',
        'inConsult',
        'inDoubt',
        'needFollow',];
//    public function user_customers()
//    {
//        return $this->hasMany(UserCourse::class,'customer_id');
//    }

}
