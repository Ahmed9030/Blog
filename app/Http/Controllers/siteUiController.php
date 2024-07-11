<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

/**
 * pro class for send the params use a lot for all pages or many
 * @param string $pageName => the view of page
 *
 * @var string $blog => settings of blog [blog_naem ,Blogemail...]
 * @var array $categoryies => all categories in database
 */
trait pro
{
    public $blog;
    public $categoryies;
    public $last_posts;
    public $tags;
    public function __construct()
    {
        // $this->middleware(['auth' , 'verified']);

        // add the value to properties
        $this->blog        = Setting::first();
        $this->categoryies = Category::all();
        $this->new_posts   = Post::orderBy('created_at' , 'desc')->take(4)->get();
        $this->tags        = Tag::all();


    }

    /**
     * includes method for send the params use a lot for all pages or many
     * @param string $pageName => the view of page
     * @var string $blog
     * @var array $categoryies
     *
     * @return  string $blog => settings of blog [blog_naem ,Blogemail...]
     * @return  array $categories => all categories in database
     */
    public function includes($pageName)
    {
        $blog          = $this->blog;
        $categoryies   = $this->categoryies;
        $new_posts     = $this->new_posts;
        $tags          = $this->tags;

        View::composer([$pageName], function ($view) use ($categoryies , $blog , $new_posts  , $tags) {
            $view->with([
                'blog'         => $blog,
                "categoryies"  => $categoryies,
                'last_posts'   => $new_posts,
                'tags'         => $tags,
            ]);
        });
        return [$categoryies, $blog , $new_posts];

    }

}
class siteUiController extends Controller
{

    use pro;
    // public function __construct()
    // {
    //     $this->middleware(['auth' , 'verified']);
    // }

    // ======== Properties ======== \\

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        list($categories, $blog, $new_posts) = $this->includes('index');
        $old_post      = Post::orderBy('created_at')->take(1)->get()->first();
        $body_posts    = Post::orderBy('created_at' , 'desc')->skip(4)->take(3)->get();
        $body_posts_2  = Post::orderBy('created_at' , 'desc')->skip(7)->take(3)->get();
        $last_posts    = $new_posts;

        return view('index' , compact('last_posts' , 'old_post' , 'body_posts' , 'body_posts_2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showPost(Post $post)
    {
        list($categories , $blog , $new_posts) = $this->includes('Posts.show');

        // $next_post = Post::min('id');
        // $prev_post = Post::max('id');
        $next_post = Post::where('id' , '>' ,  $post->id)->min('id');
        $prev_post = Post::where('id' , '<' , $post->id)->max('id');

        return view('Posts.show')
                    ->with([
                        "post"       => $post,
                        'next_post'  => Post::find($next_post),
                        'prev_post'  => Post::find($prev_post),
                    ]);
    }

    /**
     * Display the specified resource.
     */
    public function showCategory(Category $category)
    {
        list($categories , $blog , $tags) = $this->includes('categories.category');

        $posts = $category->posts()->take(5)->get();

        return view('categories.category')
                        ->with([
                            'posts'    => $posts,
                            'category' => $category,
                        ]);
    }
    /**
     * Display the specified resource.
     */
    public function showTag(Tag $tag)
    {
        list($categories , $blog , $new_posts , $tags) = $this->includes('tags.tag');

        return view('tags.tag')
                        ->with([
                            'tag' => $tag,
                        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function search(Request $request)
    {
        list($categories , $blog , $tags) = $this->includes('search-result');

        $posts = Post::where('title' , 'like' ,  '%' . $request->search . '%')->get();


        return view('search-result')
                        ->with([
                            'posts'  => $posts,
                            'title' => $request->search,
                        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
