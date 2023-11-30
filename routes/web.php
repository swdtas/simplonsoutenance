<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CandidaController;
use App\Http\Controllers\ChercheurController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\OffresController;

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

Route::get('/entreprise-inscription', [ FrontController::class, 'RegisterEntreprise'])
    ->name('entreprise-inscritpion');
    Route::get('/confirmation-creation-compte', [ FrontController::class, 'confirmation'])
    ->name('confirmation');
    Route::get('/chercheur-inscription', [ FrontController::class, 'RegisterChercheur'])
    ->name('chercheur-inscritpion');
Route::post('chercheurs/store', [ChercheurController::class, 'store'])->name('chercheurs.store');
Route::get('/accueil', [ FrontController::class, 'showAccueil'])
    ->name('accueil');
    Route::post('entreprises', [EntrepriseController::class, 'store'])->name('entreprises.store');
    Route::post('chercheurs', [ChercheurController::class, 'store'])->name('chercheurs.store');

    Route::get('/les-offres-emploi', [ FrontController::class, 'showOffre'])
    ->name('offre');

Route::get('/les-offres-emploi/{region}', [ FrontController::class, 'showOffre'])->name('route.filtre');

    Route::get('/profil-candidat', [ FrontController::class, 'showCandidat'])
    ->name('candidat');
    Route::get('/entreprise', [ FrontController::class, 'showentreprise'])
    ->name('entreprise');

Route::middleware(['auth', 'verified',])->group(function () {
    // Les route mise a jour
    Route::get('/dashboard', [DashboardController::class, 'default'])
    ->name('dashboard');
    Route::get('/dashboard-entreprise', [DashboardController::class, 'entreprise'])
    ->name('dashboard.entreprise');
    Route::resource('users', RegisteredUserController::class);
    Route::resource('domaines',DomaineController::class);
    Route::resource('regions',RegionController::class);
    Route::resource('entreprises', EntrepriseController::class)->except('store');
    Route::get('/entreprise-attente', [EntrepriseController::class, 'attente'])->name('entreprises.attente');
    Route::post('/valider-entreprise/{id}', [EntrepriseController::class, 'validerEntreprise'])->name('valider.entreprise');
    Route::post('/refuser-entreprise/{id}', [EntrepriseController::class, 'refuserEntreprise'])->name('refuser.entreprise');
    Route::get('/liste-entreprise-refuser', [EntrepriseController::class, 'refuser'])->name('listes.refuser.entreprise');
    Route::resource('offres',OffresController::class);
    Route::get('/offres-du-jour', [OffresController::class, 'today'])->name('offres.today');
    Route::resource('chercheurs', ChercheurController::class)->except('store');
    Route::get('/chercheurs-attente', [ChercheurController::class, 'attente'])->name('chercheur.attente');
    Route::post('/valider-chercheur/{id}', [ChercheurController::class, 'validerChercheur'])->name('valider.chercheur');
    Route::post('/refuser-chercheur/{id}', [ChercheurController::class, 'refuserChercheur'])->name('refuser.chercheur');
    Route::get('/liste-chercheur-refuser', [ChercheurController::class, 'refuser'])->name('listes.refuser.chercheur');
    Route::resource('candidas',CandidaController::class);
    Route::get('/candidats-du-jour', [CandidaController::class, 'candidats'])->name('candidats.today');
    Route::get('/candidas/{candida}/cv', [CandidaController::class, 'showCv'])->name('candidas.showCv');
    //Fin mis a jour
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
