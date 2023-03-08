<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Exports\BookExport;
use Excel;

class BookPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.book',[
            'title' => 'Book',
            'active' => 'book',
            "books" => Book::latest()->filter(request(['search', 'category']))->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create',[
            'title' => 'Book',
            'active' => 'book',
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'no_isbn' => 'required',
            'category_id' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'synopsis' => 'required',
        ]);

        $slug = str_replace(' ', '-',$request->title);

        $validatedData['slug'] = Str::lower($slug);

        if($image = $request->file('cover_image')) {
            $validatedData['cover_image'] = $request->file('cover_image')->store('cover_images');
        }

        Book::create($validatedData);
        return redirect('/dashboard/book')->with('successAdd', 'negro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit',[
            'title' => 'Book',
            'book' => $book,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // dd($request->all());
        $rules = [
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'no_isbn' => 'required',
            'category_id' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'synopsis' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $slug = str_replace(' ', '-',$request->title);

        $validatedData['slug'] = Str::lower($slug);

        if($image = $request->file('cover_image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['cover_image'] = $request->file('cover_image')->store('cover_images');
        }

        Book::where('id', $book->id)
                ->update($validatedData);

        return redirect('/dashboard/book')->with('success', 'negro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->cover_image) {
            Storage::delete($book->cover_image);
        }
        Book::destroy($book->id);
        return redirect('/dashboard/book')->with('success', 'negro');
    }

    public function export()
    {
        return Excel::download(new BookExport(), 'books.xlsx');
    }
}
