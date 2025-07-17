<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    return view('welcome', ['posts' => Post::paginate(5)]);// Display all posts on the home page
})->name('home');

Route::get('/create', [PostController::class, 'create']);

Route::post('/store', [PostController::class, 'ourFileStore'])->name('store'); // Route to store a new post

Route::get('/edit/{id}', [PostController::class, 'editData'])->name('edit'); // Route to edit a post

Route::post('/update/{id}', [PostController::class, 'updateData'])->name('update'); // Route to store a new post

Route::delete('/delete/{id}', [PostController::class, 'deleteData'])->name('delete'); // Route to delete a new post
