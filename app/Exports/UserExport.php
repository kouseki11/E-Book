<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings() :array
    {
        return[
            'Id',
            'Name',
            'Email',
            'Phone',
        ];
    } 
    public function collection()
    {
        return User::select('id', 'name', 'email', 'phone')->get();
    }
}
