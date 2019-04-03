<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Post;
use DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);

        return view('dashboard')->with('posts',$posts);
    }
    public function categories()
    {
        $cate = Categories::all();

        return view('admin.categories',compact('cate'));
    }
    public function del_categories(Request $request)
    {
        dd($request);

        return view('admin.categories',compact('cate'));
    }
}
