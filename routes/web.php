<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/ideas', [IdeaController::class, 'store'])->name('idea.create');

Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/feed', [FeedController::class, 'index'])->name('feed');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');