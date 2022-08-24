<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FluentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class,'index'])->name('product.index');

Route::get('/home/{name}',[HomeController::class,'index'])->name('home.index');

Route::get('/user',[UserController::class,'index'])->name('user.index');

Route::get('/posts',[ClientController::class,'getAllPost'])->name('posts.getAllPost');

Route::get('/posts/{id}',[ClientController::class,'getAllPostById'])->name('posts.getAllPostById');

Route::get('/addPost',[ClientController::class,'addPost'])->name('posts.addPost');

Route::get('/fluent-string',[FluentController::class,'index'])->name('fluent.index');

Route::get('/login',[LoginController::class,'index'])->name('login.index')->middleware('checkuser');

Route::POST('/login',[LoginController::class,'loginSubmit'])->name('login.submit');

Route::get('/session/get',[SessionController::class,'getSessionData'])->name('session.get');

Route::get('/session/set',[SessionController::class,'storeSessionData'])->name('session.store');

Route::get('/session/remove',[SessionController::class,'deleteSessionData'])->name('session.delete');

Route::get('/posts',[PostController::class,'getAllPost'])->name('posts.getAllPost');

Route::get('/add-post',[PostController::class,'addPost'])->name('posts.addPost');

Route::post('/add-post',[PostController::class,'addPostSubmit'])->name('posts.addPostSubmit');

Route::get('/posts/{id}',[PostController::class,'getPostById'])->name('post.getPostById');


Route::get('/delete-post/{id}',[PostController::class,'deletePost'])->name('post.deletePost');


Route::get('/edit-post/{id}',[PostController::class,'editPost'])->name('post.editPost');

Route::post('/update-post',[PostController::class,'updatePost'])->name('post.updatePost');


Route::get('/inner-join',[PostController::class,'innerJoinCaluse'])->name('post.innerjoin');

Route::get('/all-posts',[PostController::class,'getAllPostUsingModel'])->name('post.getAllPostUsingModel');


Route::get('/test',function(){
    return view('test');
});

Route::get('/students',[StudentController::class,'index']);

Route::post('/add-student',[StudentController::class,'addStudent'])->name('student.add');

Route::get('/students/{id}',[StudentController::class,'getStudentById']);

Route::put('/student',[StudentController::class,'updateStudent'])->name('student.update');
