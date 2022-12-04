<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{user}',[UserController::class, 'update'])->name('users.update');
Route::get('/users/edit/{user}',[UserController::class, 'edit'])->name('users.edit');
Route::get('/users/create',[UserController::class, 'create'])->name('users.create');
Route::post('/users',[UserController::class,'store'])->name('users.store');
Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/{user}',[UserController::class, 'show'])->name('users.show');

