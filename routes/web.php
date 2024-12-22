<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/contacts');
});

Route::get('/page', function () {
    $nama = "Alfredo";
    return view('page', compact('nama'));
});

Route::resource('/contacts', ContactController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', function () {
    return view('profile', [
        'current'=> 'profile'
    ]);
})->middleware('auth');

Route::get('/contacts/call/{name}', function ($name) {
    return view('');
});
