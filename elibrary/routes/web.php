<?php

use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;

Route::middleware([AdminAuth::class])->group(function() {
    Route::get('/', function () { return view('welcome'); });
    Route::get('/login', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/userHome', [UserController::class, 'index'])->name('user#home');



    Route::middleware([AdminAuth::class])->group(function() {
        Route::get('/adminHome', [AdminController::class, 'index'])->name('admin#home');

    });


});



require __DIR__.'/auth.php';
