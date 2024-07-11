<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Posts.index')->with('posts' , Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoties =  Category::all();
        $tags = Tag::all();

        // redirect is there's no categories to create categories
        if($categoties->count() === 0 )
        {
            return redirect()->route('category.create');
        }

        // redirect is there's no tags to creat tages
        if($tags->count() === 0 )
        {
            return redirect()->route('tag.create');
        }


        return view('Posts.create')->with([
            'categories' => $categoties,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request , [
            "title"           => "required",
            "description"     => "required",
            "content"         => "required",
            "category_id"     => "required",
            "image"           => 'required|image',
            "tags"            => 'required',
        ]);

        if($image = $request->file('image'))
        {
            $imagePath    = 'images/posts/';
            $imageNewNmae = date('Ymd_Hi_') . "_" . rand(0 , 1000) . "." . $image->getClientOriginalExtension();
            $image->move($imagePath ,$imageNewNmae);
            $request['image'] = $imageNewNmae;
        }

       $post =  Post::create([
            "title"           => $request->title,
            "description"     => $request->description,
            "content"         => $request->content,
            "category_id"     => $request->category_id,
            "image"           => $imageNewNmae,
            "slug"            => str::slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->back()->with("success" , "Post added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('Posts.edit')->with([
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request , [
            "title"          => "required",
            "description"    => "required",
            "content"        => "required",
            "category_id"    => "required",
            "tags"           => 'required',
        ]);

        $input = [
            "title"           => $request->title,
            "description"     => $request->description,
            "content"         => $request->content,
            "category_id"     => $request->category_id,
            "slug"            => str::slug($request->title
            )];

        if($image = $request->file('image'))
        {
            $imagePath    = 'images/posts/';
            $imageNewNmae = date('Ymd_Hi_') . "_" . rand(0 , 1000) . "." . $image->getClientOriginalExtension();
            $image->move($imagePath ,$imageNewNmae);
            $input['image'] = $imageNewNmae;
        }else
        {
            unset($input['image']);
        }

        $post->update($input);
        $post->tags()->sync($request->tags);

        return redirect()->back()->with("success" , "Post Updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with("success" , "Post deleted successflly");
    }

    /**
     * Get the deleted posts from database
     */
    public function trashed()
    {
        $post = Post::onlyTrashed()->get();

        return view('Posts.trashed')->with('posts' , $post);
    }

    /**
     * restore the posts after soft deleted
     */

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        $post->restore();
        return redirect()->route('post.index')->with("success" , "Post restored successfully");
    }

    /**
     * delete the post form trash
     */
    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back()->with("success" , "Post deleted successflly");
    }

}
