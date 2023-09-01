<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Models\fournisseurs;
use App\Http\Requests\FournisseurPostRequest;

class FournisuerController extends Controller
{
    public function index()
    {
        return view('apps.fournisseur');
    }
    //Enregister fournisseurs
    public function Stores(FournisseurPostRequest $request)
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
    }
    public function Storesjson(Request $request)
    {
        // dd($request->nomFournisseurs);

        try {
            if(!empty($request->nomFournisseurs) ||!empty($request->Designation)||!empty($request->Adresse)||!empty($request->telephone)||!empty($request->Designation)){
            $fournisseurs = new fournisseurs();
            $fournisseurs->nomFournisseurs = $request->nomFournisseurs;
            $fournisseurs->Designation = $request->Designation;
            $fournisseurs->Adresse = $request->Adresse;
            $fournisseurs->telephone = $request->telephone;
            $fournisseurs->ville = $request->ville;
            $fournisseurs->NICE = $request->NICE;
            $fournisseurs->Fax = $request->Fax;
            $fournisseurs->Num_compte_comptable = $request->Num_compte_comptable;
            $fournisseurs->ID_fiscale = $request->ID_fiscale;
            $fournisseurs->save();
            }

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
    public function table_fournisseur()
    {

        $liste_Fournisseur = fournisseurs::all();
        if ($liste_Fournisseur) {
            return response()->json([
                "code" => 200,
                'liste_Fournisseur' => $liste_Fournisseur,
            ]);
        } else {
            return response()->json([
                "code" => 500,
                'message' => "Merci de Verifier votre connexion internet",
            ]);
        }


    }

    // liste fournisseur with id 
    public function info_fournisseur(Request $request)
    {

        $info_fournisseur = fournisseurs::where('fournisseurs.deleted_at', '=', NULL)
            ->where('fournisseurs.id', $request->id_fournisseur)->get();

        if ($info_fournisseur != null) {
            return response()->json([
                'info_fournisseur' => $info_fournisseur,
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
            $check = fournisseurs::where('id', $request->delete_id_fournisseur)->first();

            if ($check != null) {
                $niveauurgence = fournisseurs::find($request->delete_id_fournisseur);
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

            $update_fournisseur = fournisseurs::where('id', $request->update_id_fournisseur)->first();

            $update_fournisseur->nomFournisseurs = $request->nomFournisseurs;
            $update_fournisseur->Designation = $request->Designation;
            $update_fournisseur->telephone = $request->telephone;
            $update_fournisseur->ville = $request->ville;
            $update_fournisseur->NICE = $request->NICE;
            $update_fournisseur->Fax = $request->Fax;
            $update_fournisseur->Num_compte_comptable = $request->Num_compte_comptable;
            $update_fournisseur->ID_fiscale = $request->ID_fiscale;

            $update_fournisseur->save();

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