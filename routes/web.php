<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
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

Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');

Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/feed', [FeedController::class, 'index']);

Route::get('/terms', function () {
    return view('terms');
});