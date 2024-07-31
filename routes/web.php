<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/home', function () {
    $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

    return view('home', compact('posts'));

})->middleware(['auth'])->name('home');
Route::post('/create_post',[\App\Http\Controllers\PostController::class, 'create'])->middleware(['auth'])->name('create_post');
Route::get('/get_post/{id}',[\App\Http\Controllers\PostController::class, 'show'])->middleware(['auth'])->name('get_post');
Route::delete('/delete_post/{id}',[\App\Http\Controllers\PostController::class, 'delete'])->middleware(['auth'])->name('delete_post');


require __DIR__.'/auth.php';
