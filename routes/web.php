<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ToDoListController;


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

Route::get('/homepage', function () {
    return view('admin.todolists.index');
})->middleware(['auth', 'verified'])->name('homepage');




Route::middleware(['auth', 'verified'])->name('admin.')->group(function () {
    // Route::resource crea automaticamente le route CRUD per le todolists
    Route::resource('todolists', ToDoListController::class);

    // Aggiungi una route esplicita per l'indice delle todolists se necessario
    Route::get('/homepage', [ToDoListController::class, 'index'])->name('homepage');
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
