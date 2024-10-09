<?php

use App\Http\Controllers\HikeController;
use App\Http\Controllers\ProfileController;
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
});

//TODO split these out so its cleaner
Route::group(['prefix' => 'hikes'], function () {
    //DATA
    Route::get('get-all', [HikeController::class, 'getAll'])->name('hikes.getAll');
    Route::get('detail/{hike}', [HikeController::class, 'getDetail'])->name('hikes.detail');
    Route::post('save-hike', [HikeController::class, 'saveHike'])->name('hikes.save');
    //VIEWS

    Route::get('create-new', function () {
        return view('new-hike');
    })->name('hikes.createNew');
    Route::get('hikes.all-hikes', function () {
        return view('all-hikes');
    })->name('hikes.allHikes');
    Route::get('hikes.home', function () {
        return view('home');
    })->name('hikes.home');
});

require __DIR__ . '/auth.php';
