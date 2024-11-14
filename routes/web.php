<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');


    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::patch('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::get('/admin/logs', [AdminController::class, 'logs'])->name('admin.logs');;
});

// Route::middleware(['auth', 'admin'])->group(function () {
// });

require __DIR__.'/auth.php';
