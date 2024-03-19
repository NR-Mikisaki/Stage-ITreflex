<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

use Inertia\Inertia;

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('Home');
Route::get('/company', [\App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('root');


Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/register', function () {
    return view('registerpage');
})->name('register')->middleware('guest');

Route::get('/dashboard', function () {
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/register',[UserController::class,'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class,'login']);

require __DIR__.'/auth.php';
