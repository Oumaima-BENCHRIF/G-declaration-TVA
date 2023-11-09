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
    //*******  Société dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('info_societe', [App\Http\Controllers\DashboardController::class, 'info_societe'])->name('info_societe');
    
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
    Route::get('/Agence/{id_agence}', [App\Http\Controllers\AgenceController::class, 'info_agence'])->name('info_agence');
    // delete succursale
    // Route::post('DeleteSuccursalse', [App\Http\Controllers\SuccursaleController::class, 'destroy'])->name('DeleteSuccursale');
    Route::post('DeleteAgence', [App\Http\Controllers\AgenceController::class, 'destroy'])->name('DeleteAgence');
    // Liste regimes
    Route::get('FK_Regime', [App\Http\Controllers\AgenceController::class, 'Liste_Regime'])->name('Liste_Regime');
    // Liste fait generateurs
    Route::get('FK_fait_generateurs', [App\Http\Controllers\AgenceController::class, 'Liste_generateurs'])->name('Liste_generateurs');
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
    Route::get('/AddFournisseurjson', [App\Http\Controllers\FournisuerController::class, 'Storesjson'])->name('AddFournisseurjson');
    // info fournisseur
    Route::get('/Fournisseur/{id_fournisseur}', [App\Http\Controllers\FournisuerController::class, 'info_fournisseur'])->name('info_fournisseur');
    // delete fournisseur
    Route::post('Deletefournisseur', [App\Http\Controllers\FournisuerController::class, 'destroy'])->name('Deletefournisseur');
    // update fournisseur
    Route::get('update_fournisseur/{update_id_fournisseur}', [App\Http\Controllers\FournisuerController::class, 'Update'])->name('update_fournisseur');
    /* ************************************************************** */

    /* ************************************************************** racine */
    // View
    Route::get('/Racine', [App\Http\Controllers\RacineController::class, 'index'])->name('Racine');

    // table Racine
    Route::get('table_racine', [App\Http\Controllers\RacineController::class, 'table_Racine'])->name('table_Racine');
    // ******* ajouter
    Route::post('/AddRacine', [App\Http\Controllers\RacineController::class, 'Stores'])->name('AddRacine');
    // info Racine
    Route::get('/Racine/{id_Racine}', [App\Http\Controllers\RacineController::class, 'info_Racine'])->name('info_Racine');
    // delete Racine
    Route::post('DeleteRacine', [App\Http\Controllers\RacineController::class, 'destroy'])->name('DeleteRacine');
    // update Racine
    Route::get('update_Racine/{update_id_Racine}', [App\Http\Controllers\RacineController::class, 'Update'])->name('update_Racine');
    /* ************************************************************** */

    /* ************************************************************** type payment */
    // View
    Route::get('/Type_payment', [App\Http\Controllers\TypePaymentController::class, 'index'])->name('TypePayment');

    // table TypePayment
    Route::get('table_TypePayment', [App\Http\Controllers\TypePaymentController::class, 'table_TypePayment'])->name('table_TypePayment');
    // ******* ajouter
    Route::post('/AddTypePayment', [App\Http\Controllers\TypePaymentController::class, 'Stores'])->name('AddTypePayment');
    // info TypePayment
    Route::get('/TypePayment/{id_TypePayment}', [App\Http\Controllers\TypePaymentController::class, 'info_TypePayment'])->name('info_TypePayment');
    // delete TypePayment
    Route::post('DeleteTypePayment', [App\Http\Controllers\TypePaymentController::class, 'destroy'])->name('DeleteTypePayment');
    // update TypePayment
    Route::get('update_TypePayment/{update_id_TypePayment}', [App\Http\Controllers\TypePaymentController::class, 'Update'])->name('update_TypePayment');
    /* ************************************************************** */

    /* ************************************************************** Regime */
    // View
    Route::get('/Regime', [App\Http\Controllers\RegimeController::class, 'index'])->name('Regime');
    // table Regime
    Route::get('table_Regime', [App\Http\Controllers\RegimeController::class, 'table_Regime'])->name('table_Regime');
    // ******* ajouter
    Route::post('/AddRegime', [App\Http\Controllers\RegimeController::class, 'Stores'])->name('AddRegime');
    // info Regime
    Route::get('/Regime/{id_Regime}', [App\Http\Controllers\RegimeController::class, 'info_Regime'])->name('info_Regime');
    // delete Regime
    Route::post('DeleteRegime', [App\Http\Controllers\RegimeController::class, 'destroy'])->name('DeleteRegime');
    // update Regime
    Route::get('update_Regime/{update_id_Regime}', [App\Http\Controllers\RegimeController::class, 'Update'])->name('update_Regime');
    /* ************************************************************** */

    /* ************************************************************** XML */
    // View
    Route::post('/xml', [App\Http\Controllers\XMLController::class, 'xml'])->name('xml');
    // table XML
    Route::get('table_XML', [App\Http\Controllers\XMLController::class, 'table_XML'])->name('table_XML');
    // ******* ajouter
    Route::post('/AddXML', [App\Http\Controllers\XMLController::class, 'Stores'])->name('AddXML');
    // info XML
    Route::get('/XML/{id_XML}', [App\Http\Controllers\XMLController::class, 'info_XML'])->name('info_XML');
    // delete XML
    Route::post('DeleteXML', [App\Http\Controllers\XMLController::class, 'destroy'])->name('DeleteXML');
    // update XML
    Route::get('update_XML/{update_id_XML}', [App\Http\Controllers\XMLController::class, 'Update'])->name('update_XML');

    /* ************************************************************** */

    /* ************************************************************** Compte charges */
    //  ******* View
    Route::get('/compte_charges', [App\Http\Controllers\CompteChargesController::class, 'index'])->name('compte_charges');
    //  ******* table Compte charges
    Route::get('table_CompteCharges', [App\Http\Controllers\CompteChargesController::class, 'table_CompteCharges'])->name('table_CompteCharges');
    // ******* ajouter
    Route::post('/AddCompteCharges', [App\Http\Controllers\CompteChargesController::class, 'Stores'])->name('AddCompteCharges');
    //  ******* info CompteCharges
    Route::get('/CompteCharges/{id_CompteCharges}', [App\Http\Controllers\CompteChargesController::class, 'info_CompteCharges'])->name('info_CompteCharges');
    //  ******* delete CompteCharges
    Route::post('DeleteCompteCharges', [App\Http\Controllers\CompteChargesController::class, 'destroy'])->name('DeleteCompteCharges');
    //  ******* update CompteCharges
    Route::get('update_CompteCharges/{update_id_CompteChargest}', [App\Http\Controllers\CompteChargesController::class, 'Update'])->name('update_CompteCharges');
    //  ******* add json 
    Route::get('/Add_CompteChargesjson', [App\Http\Controllers\CompteChargesController::class, 'Storesjson'])->name('Add_CompteChargesjson');
    /* ************************************************************** */

    Route::get('utilisateur', function () {
        return view('auth.utilisateur');
    });


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
    // importation achat
    Route::get('/AddAchatjson', [App\Http\Controllers\AchatController::class, 'Storesjson'])->name('AddAchatjson');
      // vider la table
      Route::post('/viderTable', [App\Http\Controllers\AchatController::class, 'viderTable'])->name('viderTable');
    // Liste Mode de payement
    Route::get('FK_Mpayement', [App\Http\Controllers\AchatController::class, 'Liste_Mpyement'])->name('Liste_Mpyement');
    // Liste racine
    Route::get('FK_racine', [App\Http\Controllers\AchatController::class, 'Liste_Racine'])->name('Liste_Racine');
     // liste FRS
     Route::get('FK_Ccharge', [App\Http\Controllers\AchatController::class, 'Liste_Ccharge'])->name('Liste_Ccharge');
    // get FRS
    Route::get('get_FRS/{id}', [App\Http\Controllers\AchatController::class, 'get_FRS'])->name('get_FRS');
    // get racine
    Route::get('get_racine/{id}', [App\Http\Controllers\AchatController::class, 'get_racine'])->name('get_racine');
    // ****** table succursale
    Route::get('table_succursale', [App\Http\Controllers\SuccursaleController::class, 'table_succursale'])->name('table_succursale');
    // gestion Achat
    Route::get('/achat', 'App\Http\Controllers\AchatController@index')->name('achat');
    Route::post('/add_achat', [App\Http\Controllers\AchatController::class, 'Stores'])->name('StoresAchat');
    Route::get('/update_achat', [App\Http\Controllers\AchatController::class, 'Update'])->name('update_achat');
    Route::get('/get_achat/{nfact}', [App\Http\Controllers\AchatController::class, 'get_achat'])->name('get_achat')->where('nfact', '.*');
    Route::get('/get_TBLachat/{periode}/{Exercice}', [App\Http\Controllers\AchatController::class, 'get_TBLachat'])->name('get_TBLachat');
    Route::get('/get_achatbyID/{id}', [App\Http\Controllers\AchatController::class, 'get_achatbyID'])->name('get_achatbyID');
    Route::get('/get_regime/{Exercice}', [App\Http\Controllers\AchatController::class, 'get_regime'])->name('get_regime');
    Route::get('/Etat_Achat/{periode}/{Exercice}', [App\Http\Controllers\AchatController::class, 'generatePDF'])->name('Etat_Achat');
    Route::post('DeleteAchat', [App\Http\Controllers\AchatController::class, 'destroy'])->name('DeleteAchat');
    Route::get('table_Achat/{periode}/{Exercice}', [App\Http\Controllers\AchatController::class, 'table_achat'])->name('table_Achat');
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
    // get racine
    Route::get('get_info', [App\Http\Controllers\AchatController::class, 'get_info'])->name('get_info');
    Route::get('fournisseur', function () {
        return view('apps.fournisseur'); })->name('fournisseur');
    Route::get('get_regimeByid/{id}', [App\Http\Controllers\AchatController::class, 'get_regimeByid'])->name('get_regimeByid');

    Route::get('racine', function () {
        return view('apps.racine'); });

        // Route::get('Facturation', function () {
        //     return view('apps.Facturation'); });
    Route::get('Achat', function () {
        return view('apps.Achat'); });

    Route::post('/export-to-excel', [App\Http\Controllers\AchatController::class, 'exportToExcel'])->name('exportToExcel');


    Route::get('login', function () {
        return view('authentications.style1.login'); });

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
require __DIR__ . '/auth.php';