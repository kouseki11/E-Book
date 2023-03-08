<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use PDF;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        return view('public.books',[
            "title" => "All Books" . $title,
            "active" => 'books',
            "books" => Book::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('public.book', [
            "title" => "Single Book",
            "active" => 'books',
            "book" => $book,
            "categories" => Category::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function downloadPdf(Book $book)
    {
        // return view('public.pdf', [
        //     'book' => Book::latest()->first(),
        // ]);

        
        if(Auth::user()->download_count >= 3){
            return redirect()->back()->with('limit', 'Daily Download Limited');
        }

        Book::where('id', $book->id)
                ->update([
                    'download_count' => $book->download_count + 1
                ]);
        
        User::where('id', Auth::user()->id)
                ->update([
                    'download_count' => Auth::user()->download_count + 1
                ]);
        
        $pdf = PDF::loadView('public.pdf',[
            'book' => Book::latest()->first(),
                ]);

        return $pdf->download($book->title. '.pdf');
    }
}
