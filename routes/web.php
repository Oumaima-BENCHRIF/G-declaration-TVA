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
    //*******  succursale
    Route::get('test', function () {return view('apps.test');})->name('test');
    Route::get('/succursale', 'App\Http\Controllers\SuccursaleController@index')->name('succursale');
    // ajouter
    Route::post('/succursalses', [App\Http\Controllers\SuccursaleController::class, 'Stores'])->name('Stores');
    // info succursaler with ID
    Route::get('/succursalses/{id_succursale}',  [App\Http\Controllers\SuccursaleController::class, 'info_succursale'])->name('info_succursale');
// delete succursale
Route::post('DeleteSuccursalse', [App\Http\Controllers\SuccursaleController::class, 'destroy'])->name('DeleteSuccursale');

    // Liste regimes
    Route::get('FK_Regime', [App\Http\Controllers\SuccursaleController::class, 'Liste_Regime'])->name('Liste_Regime');
    // Liste fait generateurs
    Route::get('FK_fait_generateurs', [App\Http\Controllers\SuccursaleController::class, 'Liste_generateurs'])->name('Liste_generateurs');
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
    // table succursale
    Route::get('table_succursale', [App\Http\Controllers\SuccursaleController::class, 'table_succursale'])->name('table_succursale');

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