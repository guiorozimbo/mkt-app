<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
->prefix('/profile')
->name('profile.')
->controller(ProfileController::class)
->group(function () {
    Route::get('/',  'edit')->name('edit');
    Route::patch('/', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/stores', [\App\Http\Controllers\Admin\StoreController::class,'index'])
    ->name('admin.stores.index');

Route::get('/admin/stores/create', [\App\Http\Controllers\Admin\StoreController::class,'create'])
    ->name('admin.stores.create');

Route::post('/admin/stores/store', [\App\Http\Controllers\Admin\StoreController::class,'store'])
    ->name('admin.stores.store');
