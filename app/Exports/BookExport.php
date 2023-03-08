<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings() :array
    {
        return[
            'Id',
            'Title',
            'Writer',
            'Publisher',
            'No.ISBN',
            'Category',
        ];
    } 
    public function collection()
    {
        return Book::select('id', 'title', 'writer', 'publisher', 'no_isbn', 'category_id')->get();
    }
}
