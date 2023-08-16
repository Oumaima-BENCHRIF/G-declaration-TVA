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
    // succursale
    // Route::get('succursale', function () {return view('apps.succursale');})->name('succursale');
    Route::get('/succursale', 'App\Http\Controllers\SuccursaleController@index')->name('succursale');

    // ajouter
    Route::post('succursalses', [App\Http\Controllers\SuccursaleController::class, 'Stores'])->name('Stores');
    // Liste regimes
    Route::get('FK_Regime', [App\Http\Controllers\SuccursaleController::class, 'Liste_Regime'])->name('Liste_Regime');
    // Liste fait generateurs
    Route::get('FK_fait_generateurs', [App\Http\Controllers\SuccursaleController::class, 'Liste_generateurs'])->name('Liste_generateurs');

    Route::get('fournisseur', function () {
        return view('apps.fournisseur');
    })->name('fournisseur');

    Route::get('racine', function () {return view('apps.racine');});

    Route::get('Achat', function () { return view('apps.Achat'); });

    
    Route::get('login', function () { return view('authentications.style1.login'); });
    
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});
require __DIR__ . '/auth.php';
