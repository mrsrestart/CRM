<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class bookExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct($bookName)
    {
        $this->bookName = $bookName;
    }
    public function query()
    {
        return Customer::where('selectedBook', 'like', '%'.$this->bookName.'%')
            ->orderBy('created_at');
    }
}
