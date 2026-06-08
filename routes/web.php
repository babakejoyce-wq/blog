<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
 use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil publique
Route::get('/', function () {
    return view('home'); 
})->name('home');


// Si l'utilisateur est connecté, il peut accéder aux articles
Route::middleware(['auth'])->group(function () {

    // Tableau de bord Breeze/Jetstream
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Profil utilisateur (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Mon blog 
    Route::resource('articles', ArticleController::class);
    

    Route::post('/articles/{article}/comments', [CommentController::class, 'store'])
     ->name('comments.store');

});

// Auth routes Breeze
require __DIR__.'/auth.php';
