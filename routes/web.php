<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;

use Inertia\Inertia;

Route::get('/home', function () {
    $products = \App\Models\Product::all();
    return Inertia::render('Home', [
        'products' => $products,
    ]);
});
Route::get('/company', [\App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::get('/catalogue', [\App\Http\Controllers\CatalogueController::class, 'index'])->name('catalogue');
Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('root');

Route::get('/dashboard', function () {
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Profilecontroller::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/products/index', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/paginate_index',[ProductsController::class, 'paginate_index'])->name('products.paginate');
Route::post('/register',[UserController::class,'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class,'login']);

route::get('/cartitems', [CartItemController::class, 'index']) ->name('cartItems.index');
Route::delete('/cartitems/{cart_item}', [CartItemController::class, 'destroy'])->name('cartitem.destroy');
require __DIR__.'/auth.php';
