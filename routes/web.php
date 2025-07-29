<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;


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

//public routes


//auth routes: requires users to be logged in
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Home route to display posts
    Route::get('/', [PostController::class, 'index'])->name('home');


    Route::middleware('auth')->group(function () {
    

    // Post index can be seen by both admin and observer
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    // Profile routes from Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes that are ONLY for Admins
Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::post('/posts', [PostController::class, 'ourFileStore'])->name('store');
    Route::get('/posts/{post}/edit', [PostController::class, 'editData'])->name('edit');
    Route::put('/posts/{post}', [PostController::class, 'updateData'])->name('update');
    Route::delete('/posts/{post}', [PostController::class, 'deleteData'])->name('delete');
});

require __DIR__.'/auth.php';
