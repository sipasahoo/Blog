<?php

namespace App\Http\Controllers;
use App\Models\Blogs;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blogs::latest()->paginate(5);
        return view('blogs.index',compact('blogs'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
