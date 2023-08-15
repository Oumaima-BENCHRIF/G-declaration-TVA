<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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
    Route::get('succursole', function () {
        return view('apps.succursole');
    })->name('succursole');

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
