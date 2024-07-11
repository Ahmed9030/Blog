<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategotyiesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\siteUiController;
use Illuminate\Routing\RouteGroup;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Setting;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::group(['prefix' => 'admin'] , function(){

        // posts routes
        Route::get('/posts' , [PostsController::class , 'index'])->name('post.index');
        Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
        Route::post('/post/store', [PostsController::class , 'store'])->name('post.store');
        Route::get('/post/{post}/edit', [PostsController::class , 'edit'])->name('post.edit');
        Route::post('/post/{post}/update', [PostsController::class , 'update'])->name('post.update');
        Route::get('/post/{post}/delete', [PostsController::class , 'destroy'])->name('post.delete');
        Route::get('/post/{post}/restore', [PostsController::class , 'restore'])->name('post.restore');
        Route::get('/posts/trashed', [PostsController::class , 'trashed'])->name('post.trashed');
        Route::get('/post/{post}/hdelete', [PostsController::class , 'hdelete'])->name('post.hdelete');

        // categoryies routes
        Route::get('/categories' , [CategotyiesController::class , 'index'])->name('category.index');
        Route::get('/category/create' , [CategotyiesController::class , 'create'])->name('category.create');
        Route::post('/category/store' , [CategotyiesController::class , 'store'])->name('category.store');
        Route::get('/category/{category}/edit/' , [CategotyiesController::class , 'edit'])->name('category.edit');
        Route::post('/category/{category}/update' , [CategotyiesController::class , 'update'])->name('category.update');
        Route::get('/category/{category}/delete' , [CategotyiesController::class , 'destroy'])->name('category.delete');

        // tags routes
        Route::get('/tags' , [TagController::class , 'index'])->name('tags');
        Route::get('/tag/create' , [TagController::class , 'create'])->name('tag.create');
        Route::post('/tag/store' , [TagController::class , 'store'])->name('tag.store');
        Route::get('/tag/{tag}/edit/' , [TagController::class , 'edit'])->name('tag.edit');
        Route::post('/tag/{tag}/update' , [TagController::class , 'update'])->name('tag.update');
        Route::get('/tag/{tag}/delete' , [TagController::class , 'destroy'])->name('tag.delete');

        // Users routes
        Route::get('/users' , [UsersController::class , 'index'])->name('users');
        Route::get('/users/create' , [UsersController::class , 'create'])->name('user.create');
        Route::post('/users/store' , [UsersController::class , 'store'])->name('user.store');
        Route::get('/user/{user}/profile' , [UsersController::class , 'show'])->name('user.profile');
        Route::post('/user/{user}/profile/update' , [UsersController::class , 'updateProfile'])->name('profile.update');
        Route::get('/user/{user}/edit' , [UsersController::class , 'edit'])->name('user.edit');
        Route::post('/user/{user}/update' , [UsersController::class , 'update'])->name('user.update');

        Route::get('/user/{user}/admin' , [UsersController::class , 'admin'])->name('user.admin');
        Route::get('/user/{user}/delete/admin' , [UsersController::class , 'Dadmin'])->name('user.delete.admin');

        Route::get('/user/delete' , [UsersController::class , 'destroy'])->name('user.delete');

        // sttings route
        Route::get('/settings' , [SettingsController::class , 'index'])->name('settings');
        Route::post('/settings/update' , [SettingsController::class , 'update'])->name('settings.update');
    });

});

    // site users routes
    Route::get('/' , [siteUiController::class , 'index'])->name('index');
    Route::get('/{post}/{slug}' , [siteUiController::class , 'showPost'])->name('post.show');
    Route::get('/category/{category}/show' , [siteUiController::class , 'showCategory'])->name('category');
    Route::get('/tag/{tag}/show' , [siteUiController::class , 'showTag'])->name('tag.show');
    Route::get('/search-results' , [siteUiController::class , 'search'])->name('search');
    Route::get('/about' , function(){
        return view('about')->with([
            'blog'        => Setting::first(),
            'categoryies' => Category::all(),
            'last_posts'  => Post::orderBy('created_at' , 'desc')->take(4)->get(),
        ]);
    })->name('about');





Route::get('/cate' , function(){
    return Category::find(1)->posts;
});
Route::get('/post' , function(){
    return Post::find(1)->category;
});
// get the tag's posts number 1
Route::get('/tags' , function(){
    return Tag::find(1)->posts;
});
// get the post's tags  number 1
Route::get('/post-tag' , function(){
    return Post::find(5)->tags;
});
// get the user's profile number 1
Route::get('/user-profile' , function(){
    return User::find(1)->profile;
});


