<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

// The route we have created to show all blog posts.
Route::get('/blog', [PostController::class, 'index']);

Route::get('/blog/{post}', [PostController::class, 'show']);

Route::get('/blog/create/post', [PostController::class, 'create']); //shows create post form
Route::post('/blog/create/post', [PostController::class, 'store']); //saves the created post to the databse
Route::get('/blog/{post}/edit', [PostController::class, 'edit']); //shows edit post form
Route::put('/blog/{post}/edit', [PostController::class, 'update']); //commits edited post to the database
Route::delete('/blog/{post}', [PostController::class, 'destroy']); //deletes post from the database
