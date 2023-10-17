<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompteCharges;
use Illuminate\Validation\ValidationException;

class CompteChargesController extends Controller
{
    public function index()
    {
        return view('apps.compte_charges');
    }

    public function Stores(Request $request)
    {

        try {
            $CompteCharges = new CompteCharges();
            $CompteCharges->N_compte_charges_immob = $request->input('N_compte_charges_immob');
            $CompteCharges->Intitule = $request->input('Intitule');

            $CompteCharges->save();
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

    public function table_CompteCharges()
    {
        try {
            $liste_CompteCharges = CompteCharges::all();
            if ($liste_CompteCharges) {
                return response()->json([
                    "code" => 200,
                    'liste_CompteCharges' => $liste_CompteCharges,
                ]);
            } else {
                return response()->json([
                    "code" => 500,
                    'message' => "Merci de Verifier votre connexion internet",
                ]);
            }
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('danger', 'Une erreur s\'est produite. Merci de contacter le service IT.')
                ->withInput();
        }



    }
    public function Update(Request $request)
    {
        try {

            $update_CompteCharges = CompteCharges::where('id', $request->update_id_CompteCharges)->first();

            $update_CompteCharges->N_compte_charges_immob = $request->N_compte_charges_immob;
            $update_CompteCharges->Intitule = $request->Intitule;
          

            $update_CompteCharges->save();

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

    public function info_CompteCharges(Request $request)
    {

        $info_CompteCharges = CompteCharges::where('compte_charges.deleted_at', '=', NULL)
            ->where('compte_charges.id', $request->id_CompteCharges)->get();

        if ($info_CompteCharges != null) {
            return response()->json([
                'info_CompteCharges' => $info_CompteCharges,
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

    public function destroy(Request $request)
    {
        try {
            $check = CompteCharges::where('id', $request->delete_id_CompteCharges)->first();

            if ($check != null) {
                $delete_CompteCharges = CompteCharges::find($request->delete_id_CompteCharges);
                $delete_CompteCharges->delete();


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

    public function Storesjson(Request $request)
    {
        try {
            if(!empty($request->N_compte_charges_immob) ||!empty($request->Intitule)){
            $CompteCharges = new CompteCharges();
            $CompteCharges->N_compte_charges_immob = $request->N_compte_charges_immob;
            $CompteCharges->Intitule = $request->Intitule;

            $CompteCharges->save();
            return response()->json([
                'status' => 200,
                'message' => 'Ajouter avec succès',
            ]);
            }

           
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->with('danger', 'Merci de vérifier les champs requis.')
                ->withErrors($e->errors()) 
                ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('danger', 'Une erreur s\'est produite. Merci de contacter le service IT.')
                ->withInput();
        }
    }

}