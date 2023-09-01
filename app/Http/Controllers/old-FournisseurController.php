<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;
use App\Models\regime;
use App\Models\fait_generateur;
use App\Models\fournisseurs;
class fournisseursController extends Controller
{
    public function index()
    {
        return view('apps.fournisseur');
    }
    //Enregister fournisseurs
    public function Stores(Request $request)
    {


        try {
            $fournisseurs = new fournisseurs();
            $fournisseurs->nomFournisseurs = $request->input('nomFournisseurs');
            $fournisseurs->Designation = $request->input('Designation');
            $fournisseurs->Adresse = $request->input('Adresse');
            $fournisseurs->telephone = $request->input('telephone');
            $fournisseurs->ville = $request->input('ville');
            $fournisseurs->NICE = $request->input('NICE');
            $fournisseurs->Fax = $request->input('Fax');
            $fournisseurs->Num_compte_comptable = $request->input('Num_compte_comptable');
            $fournisseurs->ID_fiscale = $request->input('ID_fiscale');
            $fournisseurs->save();

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
    // table fournisseurs
    public function table_fournisseurs()
    {

        $table_fournisseurs = fournisseurs::all();
        if ($table_fournisseurs) {
            return response()->json([
                "code" => 200,
                'liste_fournisseurs' => $table_fournisseurs,
            ]);
        } else {
            return response()->json([
                "code" => 500,
                'message' => "Merci de Verifier votre connexion internet",
            ]);
        }


    }
// liste fournisseurs with id 
    public function info_fournisseurs(Request $request)
    {
        
        $info_fournisseurss = fournisseurs::where('fournisseurss.deleted_at', '=', NULL)
        ->where('fournisseurss.id', $request->id_fournisseurs)->get();
     
        if ($info_fournisseurss != null) {
            return response()->json([
                'info_fournisseurs' => $info_fournisseurss,
                'status' => 200,
                'message' => 'fournisseurs existe',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'errors' => 'fournisseurs n\éxiste pas',
            ]);
        }
    }
    // delete fournisseurs
    public function destroy(Request $request)
    {

         
        try {
            $check = fournisseurs::where('id', $request->delete_id_fournisseurs)->first();
            
            if ($check != null) {
                $niveauurgence = fournisseurs::find($request->delete_id_fournisseurs);
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

            $update_fournisseurs = fournisseurs::where('id', $request->update_id_fournisseurs)->first();
         
            $update_fournisseurs->ICE = $request->ICE;
            $update_fournisseurs->Email = $request->Email;
            $update_fournisseurs->Activite = $request->Activite;
            $update_fournisseurs->ID_Fiscale = $request->ID_Fiscale;
            $update_fournisseurs->Ville = $request->Ville;

          
            $update_fournisseurs->Tele = $request->Tele;
            $update_fournisseurs->Adresse = $request->Adresse;
            $update_fournisseurs->nom_succorsale = $request->nom_succorsale;
            $update_fournisseurs->Fax = $request->Fax;
            $update_fournisseurs->FK_Regime = $request->FK_Regime;
            $update_fournisseurs->FK_fait_generateurs = $request->FK_fait_generateurs;
            $update_fournisseurs->nomBD = $request->nomBD;

            $update_fournisseurs->save();

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
