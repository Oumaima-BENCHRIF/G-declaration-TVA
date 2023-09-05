<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\racine;

class RacineController extends Controller
{
    public function index()
    {
        return view('apps.racine');
    }
    //Enregister fournisseurs
    public function Stores(Request $request)
    {
 
        try {
            $racine = new racine();
            $racine->Num_racines = $request->input('Num_racines');
            $racine->Nom_racines = $request->input('Nom_racines');
            $racine->Taux = $request->input('Taux');
            
            $racine->save();
           
            return response()->json([
                'status' => 200,
                'message' => 'Ajouter avec succès',
            ]);
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->with('danger', 'Merci de vérifier les champs requis.')
                ->withErrors($e->errors()) // Pass the validation errors to the view
                ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('danger', 'Une erreur s\'est produite. Merci de contacter le service IT.')
                ->withInput();
        }
    }

     // table Fournisseur
     public function table_Racine()
     {
 
         $liste_racine = racine::all();
         if ($liste_racine) {
             return response()->json([
                 "code" => 200,
                 'liste_racine' => $liste_racine,
             ]);
         } else {
             return response()->json([
                 "code" => 500,
                 'message' => "Merci de Verifier votre connexion internet",
             ]);
         }
 
 
     }
 
     // liste racine with id 
     public function info_Racine(Request $request)
     {
 
         $info_racines = racine::where('racines.deleted_at', '=', NULL)
             ->where('racines.id', $request->id_Racine)->get();
 
         if ($info_racines != null) {
             return response()->json([
                 'info_racines' => $info_racines,
                 'status' => 200,
                 'message' => 'agence existe',
             ]);
         } else {
             return response()->json([
                 'status' => 400,
                 'errors' => 'agence n\éxiste pas',
             ]);
         }
     }
     // delete fournisseur
     public function destroy(Request $request)
     {
         try {
             $check = racine::where('id', $request->delete_id_racine)->first();
 
             if ($check != null) {
                 $niveauurgence = racine::find($request->delete_id_racine);
                 $niveauurgence->delete();
 
 
                 return response()->json([
                     'status' => 200,
                     'message' => 'Suppression avec succès',
                 ]);
             } else {
                 return response()->json([
                     'status' => 200,
                     'danger' => 'Vérifiez votre données',
                 ]);
             }
         } catch (\Exception $e) {
 
             return redirect()
                 ->back()
                 ->with('danger', 'Merci de vérifier la connexion internet, si non Contacter le service IT')
                 ->withInput();
         }
     }
     public function Update(Request $request)
     {
         try {
 
             $update_racine = racine::where('id', $request->update_id_racine)->first();
          
             $update_racine->Taux = $request->Taux;
             $update_racine->Nom_racines = $request->Nom_racines;
             $update_racine->Num_racines = $request->Num_racines;
 
             $update_racine->save();
 
             return response()->json([
                 'status' => 200,
                 'messages' => 'Modification avec succès',
             ]);
         } catch (\Exception $e) {
 
             return response()->json([
                 'status' => 200,
                 'Error' => 'Merci de vérifier la connexion internet, si non email_clienter le service IT',
             ]);
         }
     }

}
