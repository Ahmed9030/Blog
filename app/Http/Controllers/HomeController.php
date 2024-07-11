<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct()
    {
        $this->middleware(['auth' , 'verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories        = Category::all();
        $posts             = Post::all();
        $posts_trashed     = Post::onlyTrashed()->get();
        $tags              = Tag::all();
        $users             = User::all();

        return view('dachboard'  , compact('categories' , 'posts' , 'posts_trashed' , 'tags' , 'users'));
    }
}
