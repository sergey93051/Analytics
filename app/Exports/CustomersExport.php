<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection , WithHeadings
{
    protected $data;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function collection()
    {
        return collect($this->data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings() :array
    {
        return [
            'id',
            'Count',
            'Last order_id',
            "First name",
            'Last name',
            "Email",
            "Phone",
            "Accepts marketing",
            "Orders count",
            "Total_spent" ,
            "Currency" ,
            "Tax_exempt",
            "Created_at"
         ];
    }
}
