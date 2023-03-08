<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'books' => Book::all(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
