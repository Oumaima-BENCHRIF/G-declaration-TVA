<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Models\type_payment;

class TypePaymentController extends Controller
{
    public function index()
    {
        return view('apps.Type_payment');
    }
    //Enregister Type payement
    public function Stores(Request $request)
    {

        try {
            $type_payment = new type_payment();
            $type_payment->Num_payment = $request->input('Num_payment');
            $type_payment->Nom_payment = $request->input('Nom_payment');
            
            $type_payment->save();
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
     public function table_TypePayment()
     {
 
         $liste_TypePayment = type_payment::all();
         if ($liste_TypePayment) {
             return response()->json([
                 "code" => 200,
                 'liste_TypePayment' => $liste_TypePayment,
             ]);
         } else {
             return response()->json([
                 "code" => 500,
                 'message' => "Merci de Verifier votre connexion internet",
             ]);
         }
 
 
     }
 
     // liste racine with id 
     public function info_TypePayment(Request $request)
     {
 
         $info_TypePayment = type_payment::where('type_payments.deleted_at', '=', NULL)
             ->where('type_payments.id', $request->id_TypePayment)->get();
 
         if ($info_TypePayment != null) {
             return response()->json([
                 'info_TypePayment' => $info_TypePayment,
                 'status' => 200,
                 'message' => 'Existe',
             ]);
         } else {
             return response()->json([
                 'status' => 400,
                 'errors' => 'N\'éxiste pas',
             ]);
         }
     }
     // delete fournisseur
     public function destroy(Request $request)
     {
         try {
             $check = type_payment::where('id', $request->delete_id_TypePayment)->first();
 
             if ($check != null) {
                 $niveauurgence = type_payment::find($request->delete_id_TypePayment);
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
 
             $update_TypePayment = type_payment::where('id', $request->update_id_TypePayment)->first();
             $update_TypePayment->Nom_payment = $request->Nom_payment;
             $update_TypePayment->Num_payment = $request->Num_payment;
             $update_TypePayment->save();
 
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
