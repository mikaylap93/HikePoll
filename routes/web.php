<?php

use App\Http\Controllers\HikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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
