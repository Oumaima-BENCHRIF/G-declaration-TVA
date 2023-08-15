<?php

namespace App\Http\Controllers;
use App\Models\succursale;

use Illuminate\Http\Request;
use App\Models\regime;
use App\Models\fait_generateur;


class SuccursaleController extends Controller
{
    public function index()
    {
        return view('apps.succursale');
    }
   //Enregister succursale
   public function Stores(Request $request)
   {
    

try {
           $succursale = new succursale();
           $succursale->nom_succorsale = $request->input('nom_succorsale');
           $succursale->ICE = $request->input('ICE');
           $succursale->Email = $request->input('Email');
           $succursale->Activite = $request->input('Activite');
           $succursale->ID_Fiscale = $request->input('ID_Fiscale');
           $succursale->Ville = $request->input('Ville');
           $succursale->Tele = $request->input('Tele');
           $succursale->Adresse = $request->input('Adresse');
           $succursale->Fax = $request->input('Fax');
           $succursale->Periode = $request->input('Periode');
           $succursale->FK_Regime = $request->input('FK_Regime');
           $succursale->FK_fait_generateurs = 1;
           $succursale->save();

           session()->flash('success', 'Votre demande a été bien envoyée.');
           return back();
       } catch (\Exception $e) {

           return redirect()
               ->back()
               ->with('danger', 'Merci de vérifier la connexion internet, si non contacter le service IT')
               ->withInput();
       }
    //        return response()->json([
    //         'status' => 200,
    //         'message' => 'Votre demande a été bien envoyée.',
    //     ]);
    // } catch (\Exception $e) {
    //     return response()->json([
    //         'status' => 400,
    //         'errors' => 'Merci de vérifier la connexion internet, si non le service IT',
    //     ]);
     
    // }

  } 
  //liste regimes
  public function Liste_Regime(Request $request)
  {
      $Liste_regimes = regime::where('regimes.deleted_at', '=', NULL)
          ->orderBy("id", "desc")->get();
         
      return response()->json([
          'Liste_regimes' => $Liste_regimes
      ]);
  }

   //liste fait generateurs
   public function Liste_generateurs(Request $request)
   {
       $Liste_regimes = fait_generateur::where('fait_generateurs.deleted_at', '=', NULL)
           ->orderBy("id", "desc")->get();
          
       return response()->json([
           'Liste_fait_generateurs' => $Liste_regimes
       ]);
   }
}
