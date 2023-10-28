<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitePubliController;
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

Route::get('/accueil', [SitePubliController::class, 'showPublicProducts'])->name('accueil');

Route::get('/index', function () {
    return view('index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/backoffice/register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('/backoffice/register', [RegisteredUserController::class, 'store']);
    
    Route::get('/backoffice/dashboard', function () {
        return view('backoffice.dashboard');
    })->name('dashboard');
   
   
    Route::get('/backoffice/product/create', [ProductController::class, 'create'])
    ->name('product.create');
    Route::get('/backoffice/product/lister', [ProductController::class, 'lister'])
    ->name('list_product');
    Route::post('/backoffice/product/store', [ProductController::class, 'store'])
    ->name('product.store');
    Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/backoffice/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');


    Route::post('/backoffice/categories/store', [CategoryController::class, 'store'])
    ->name('categories.store');;
    Route::get('/backoffice/list-categories', [CategoryController::class, 'lister'])->name('list_categorie');
    Route::get('/backoffice/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');
    Route::delete('/backoffice/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    
    Route::get('/backoffice/user', [RegisteredUserController::class, 'lister'])->name('user');
    Route::get('/backoffice/user/{id}/edit', [RegisteredUserController::class, 'edit'])->name('editUser');
    Route::get('/backoffice/user/{id}',  [RegisteredUserController::class, 'show'])->name('showUser');
    Route::delete('/backoffice/user/{id}', [RegisteredUserController::class, 'destroy'])->name('deleteUser');

    Route::get('/backoffice/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/backoffice/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/backoffice/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

Route::middleware(['checkUserRole'])->group(function () {
    Route::get('/backoffice/register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('/backoffice/register', [RegisteredUserController::class, 'store']);
    Route::get('/backoffice/user', [RegisteredUserController::class, 'lister'])->name('user');
    Route::get('/backoffice/user/{id}/edit', [RegisteredUserController::class, 'edit'])->name('editUser');
    Route::get('/backoffice/user/{id}',  [RegisteredUserController::class, 'show'])->name('showUser');
    Route::delete('/backoffice/user/{id}', [RegisteredUserController::class, 'destroy'])->name('deleteUser');

});

Route::get('/', function () {
    return view('login'); 
})->middleware('guest')->name('login');

require __DIR__.'/auth.php';
