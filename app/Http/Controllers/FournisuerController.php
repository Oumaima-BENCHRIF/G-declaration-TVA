<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Models\fournisseurs;
class FournisuerController extends Controller
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
}
