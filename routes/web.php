<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Komang Kysa Tri Darma",
        "rombel" => "PPLG XI-4",
        "hobby" => "Ngoding dan Bulu Tangkis",
        "image" => "iruma.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
    //halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Categories',
        "active" => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}',function(Category $category){
    return view('posts',[
        'title' => "Post by Category:$category->name",
        "active" => 'categories',
        'posts' => $category->posts->load('category','author')
    ]);
});

Route::get('/authors/{author:username}',function(User $author){
    return view('posts',[
        'title' => "Posts by Author: $author->name",
        'posts' => $author->posts->load('category','author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');

Route::get('/dashboard/categories/{slug}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
Route::put('/dashboard/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');

Route::prefix('/users')->name('dashboard.users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});
