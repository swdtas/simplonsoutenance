<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;


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
Route::get('/espace-entreprise', [ FrontController::class, 'showEspaceEntreprise'])
    ->name('espace_entreprise');
Route::get('/entreprise-inscription', [EntrepriseController::class, 'FrontCreate'])
    ->name('entreprise-inscritpion');

    Route::get('/espace-entreprise', [ FrontController::class, 'showEspaceEntreprise'])
    ->name('espace_entreprise');
Route::get('/accueil', [ FrontController::class, 'showAccueil'])
    ->name('accueil');
    Route::get('/les-offres-emploi', [ FrontController::class, 'showOffre'])
    ->name('offre');
    Route::get('/profil-candidat', [ FrontController::class, 'showCandidat'])
    ->name('candidat');
    Route::get('/actualite', [ FrontController::class, 'showActualite'])
    ->name('actualite');

Route::middleware(['auth', 'verified'])->group(function () {
    // Les route mise a jour
    Route::get('/dashboard', [DashboardController::class, 'create'])
    ->name('dashboard');
    Route::resource('users', RegisteredUserController::class);
    Route::resource('domaines',DomaineController::class);
    Route::resource('regions',RegionController::class);

    //Fin mis a jour





    Route::get('/backoffice/user', [RegisteredUserController::class, 'lister'])->name('user');
    Route::get('/user/{id}/edit', [RegisteredUserController::class, 'edit'])->name('editUser');
    Route::put('/user/{id}', [RegisteredUserController::class, 'update'])->name('updateUser');
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
