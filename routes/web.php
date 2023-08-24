<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SuccursaleController;


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
    return view('dashboard.dashboard1');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard1');

})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'apps', 'middleware' => ['auth'], 'as' => 'dashboard.'], function () {
    //*******  Société
    // ****** table societe
    // Route::get('table_succursale', [App\Http\Controllers\SuccursaleController::class, 'table_succursale'])->name('table_succursale');
    Route::get('table_Agence', [App\Http\Controllers\AgenceController::class, 'table_Agence'])->name('table_Agence');
    // ******* view
    // Route::get('/succursale', 'App\Http\Controllers\SuccursaleController@index')->name('succursale');
    Route::get('/Agence', [App\Http\Controllers\AgenceController::class, 'index'])->name('agence');
    // ******* ajouter
    // Route::post('/succursalses', [App\Http\Controllers\SuccursaleController::class, 'Stores'])->name('Stores');
    Route::post('/AddAgence', [App\Http\Controllers\AgenceController::class, 'Stores'])->name('AddAgence');
    // info Agence with ID
    // Route::get('/succursalses/{id_succursale}',  [App\Http\Controllers\SuccursaleController::class, 'info_succursale'])->name('info_succursale');
    Route::get('/Agence/{id_agence}',  [App\Http\Controllers\AgenceController::class, 'info_agence'])->name('info_agence');
    // delete succursale
    // Route::post('DeleteSuccursalse', [App\Http\Controllers\SuccursaleController::class, 'destroy'])->name('DeleteSuccursale');
    Route::post('DeleteAgence', [App\Http\Controllers\AgenceController::class, 'destroy'])->name('DeleteAgence');
    // Liste regimes
    Route::get('FK_Regime', [App\Http\Controllers\SuccursaleController::class, 'Liste_Regime'])->name('Liste_Regime');
    // Liste fait generateurs
    Route::get('FK_fait_generateurs', [App\Http\Controllers\SuccursaleController::class, 'Liste_generateurs'])->name('Liste_generateurs');
    // update succursale
    //   Route::get('update_succursale', [App\Http\Controllers\SuccursaleController::class, 'Update'])->name('update_succursale');
    Route::get('update_Agence/{update_id_agence}', [App\Http\Controllers\AgenceController::class, 'Update'])->name('update_Agence');
    
    
    
    
    /* ************************************************************** fournisseur */
    // View
    Route::get('/Fourniseur', [App\Http\Controllers\FournisuerController::class, 'index'])->name('Fourniseur');

    // table fournisseur
    Route::get('table_fournisseur', [App\Http\Controllers\FournisuerController::class, 'table_fournisseur'])->name('table_fournisseur');
    // ******* ajouter
    Route::post('/AddFournisseur', [App\Http\Controllers\FournisuerController::class, 'Stores'])->name('AddFournisseur');
    // info fournisseur
    Route::get('/Fournisseur/{id_Fournisseur}',  [App\Http\Controllers\FournisuerController::class, 'info_fournisseur'])->name('info_fournisseur');
    // delete fournisseur
    Route::post('Deletefournisseur', [App\Http\Controllers\FournisuerController::class, 'destroy'])->name('Deletefournisseur');
    // update fournisseur
    Route::get('update_fournisseur/{update_id_fournisseur}', [App\Http\Controllers\FournisuerController::class, 'Update'])->name('update_fournisseur');
    /* ************************************************************** */

    // liste FRS
    Route::get('FK_FRS', [App\Http\Controllers\AchatController::class, 'Liste_FRS'])->name('Liste_fournisseur');
     // Liste Mode de payement
     Route::get('FK_Mpayement', [App\Http\Controllers\AchatController::class, 'Liste_Mpyement'])->name('Liste_Mpyement');
        // Liste racine
     Route::get('FK_racine', [App\Http\Controllers\AchatController::class, 'Liste_Racine'])->name('Liste_Racine');
       // get FRS
       Route::get('get_FRS/{id}', [App\Http\Controllers\AchatController::class, 'get_FRS'])->name('get_FRS');
        // get racine
        Route::get('get_racine/{id}', [App\Http\Controllers\AchatController::class, 'get_racine'])->name('get_racine');
    
    // ****** table succursale
    Route::get('table_succursale', [App\Http\Controllers\SuccursaleController::class, 'table_succursale'])->name('table_succursale');
    // gestion Achat
    Route::get('/achat', 'App\Http\Controllers\AchatController@index')->name('achat');
    Route::post('/add_achat', [App\Http\Controllers\AchatController::class, 'Stores'])->name('StoresAchat');
    Route::get('/get_achat/{nfact}', [App\Http\Controllers\AchatController::class, 'get_achat'])->name('get_achat');
    
    Route::get('fournisseur', function () {
        return view('apps.fournisseur');
    })->name('fournisseur');

    Route::get('racine', function () {
        return view('apps.racine'); });

    Route::get('Achat', function () {
        return view('apps.Achat'); });


    Route::get('login', function () {
        return view('authentications.style1.login'); });

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
require __DIR__ . '/auth.php';