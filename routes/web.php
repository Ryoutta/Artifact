<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/arts',[ArtController::class,'index']);
    Route::get('/arts/create',[ArtController::class,'create']);
    Route::get('/arts/{art}', [ArtController::class ,'show']);
    Route::post('/arts', [ArtController::class,'store']);
    Route::get('/categories/{category}',[CategoryController::class,'index']);
    Route::get('/arts/{art}/edit',[ArtController::class,'edit']);
    Route::put('arts/{art}',[ArtController::class, 'update']);
    Route::delete('/arts/{art}',[ArtController::class, 'delete']);
    //コメント投稿処理
    Route::post('/arts/{comment_id}/comments',[CommentsController::class,'store']);

//コメント取消処理
    Route::delete('/comments/{comment_id}', [CommentsController::class,'destroy']);
    Route::get('/users/{name}', 'UserController@show')->name('users.show');

    Route::post('/art/like/{id}', [LikesController::class, 'like'])->name('art.like');
    Route::post('/art/unlike/{id}', [LikesController::class, 'unlike'])->name('art.unlike');
    

});

require __DIR__.'/auth.php';
