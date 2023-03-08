<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        return view('user.landing',[
            'title' => 'Landing',
            'active' => 'landing',
            'books' => Book::orderBy('download_count', 'desc')->take('3')->get(),
        ]);
    }
}
