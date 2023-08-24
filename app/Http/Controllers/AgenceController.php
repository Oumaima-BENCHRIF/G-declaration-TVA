<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Requests\AgencesPostRequest;

use Illuminate\Http\Request;
use App\Models\regime;
use App\Models\fait_generateur;
use App\Models\agence;

class AgenceController extends Controller
{
    public function index()
    {
        return view('apps.Agence');
    }
    //Enregister agence
    public function Stores(AgencesPostRequest $request)
    {


        try {
            $agence = new agence();
            $agence->nom_succorsale = $request->input('nom_succorsale');
            $agence->ICE = $request->input('ICE');
            $agence->Email = $request->input('Email');
            $agence->Activite = $request->input('Activite');
            $agence->ID_Fiscale = $request->input('ID_Fiscale');
            $agence->Ville = $request->input('Ville');
            $agence->Tele = $request->input('Tele');
            $agence->Adresse = $request->input('Adresse');
            $agence->Fax = $request->input('Fax');
            $agence->FK_Regime = $request->input('FK_Regime');
            $agence->FK_fait_generateurs = $request->input('FK_fait_generateurs');
            $agence->save();

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
    // table agence
    public function table_agence()
    {

        $table_agence = agence::all();
        if ($table_agence) {
            return response()->json([
                "code" => 200,
                'liste_agence' => $table_agence,
            ]);
        } else {
            return response()->json([
                "code" => 500,
                'message' => "Merci de Verifier votre connexion internet",
            ]);
        }


    }
// liste agence with id 
    public function info_agence(Request $request)
    {
        
        $info_agences = agence::where('agences.deleted_at', '=', NULL)
        ->where('agences.id', $request->id_agence)->get();
     
        if ($info_agences != null) {
            return response()->json([
                'info_agence' => $info_agences,
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
    // delete agence
    public function destroy(Request $request)
    {

         
        try {
            $check = agence::where('id', $request->delete_id_agence)->first();
            
            if ($check != null) {
                $niveauurgence = agence::find($request->delete_id_agence);
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

            $update_agence = agence::where('id', $request->update_id_agence)->first();
          
dd($request);
            $update_agence->ICE = $request->ICE;
            $update_agence->Email = $request->Email;
            $update_agence->Activite = $request->Activite;
            $update_agence->ID_Fiscale = $request->ID_Fiscale;
            $update_agence->Ville = $request->Ville;

          
            $update_agence->Tele = $request->Tele;
            $update_agence->Adresse = $request->Adresse;
            $update_agence->nom_succorsale = $request->nom_succorsale;
            $update_agence->Fax = $request->Fax;
            $update_agence->FK_Regime = $request->FK_Regime;
            $update_agence->FK_fait_generateurs = $request->FK_fait_generateurs;
            $update_agence->nomBD = $request->nomBD;

            $update_agence->save();

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
