<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Students;
use App\Livewire\Receipts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', Students\Index::class)->name('students.index');
    Route::get('/students/create', Students\Create::class)->name('students.create');
    Route::get('/students/edit/{student}', Students\Edit::class)->name('students.edit');

    Route::get('/receipts', function () {
        return view('receipts');
    });
});

require __DIR__.'/auth.php';
