<?php

namespace App\Http\Controllers;

use App\Models\achat;
use App\Models\fournisseurs;
use App\Models\type_payment;
use App\Models\racine;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    public function index()
    {
        return view('apps.Achat');
    }
       //Enregister Achat
        public function Stores(Request $request)
        { 
            try {
            
      
            $frs=fournisseurs::select('fournisseurs.*')
            ->where('fournisseurs.deleted_at', '=', NULL)
            ->where('fournisseurs.id',$request->input('frs'))->first();
            $frs->Designation=$request->input('desc');
            $frs->save();
            $achat = new achat();
            $achat->N_facture=$request->input('n_fact');
            $achat->Date_facture=$request->input('date_fact');
            $achat->Date_payment=$request->input('date_p');
            $achat->Designation=$request->input('desc');
            $achat->TVA_2=$request->input('tva_2');
            $achat->TVA_3=$request->input('tva_3');
            $achat->TVA_1=$request->input('tva_1');
            $achat->M_HT_1=$request->input('MHT_1');
            $achat->M_HT_2=$request->input('MHT_2');
            $achat->M_HT_3=$request->input('MHT_3');
            $achat->M_TTC=$request->input('ttc');
            $achat->Prorata=$request->input('prorata');
            $achat->TVA_deductible3=$request->input('tva_d3');
            $achat->TVA_deductible2=$request->input('tva_d2');
            $achat->TVA_deductible=$request->input('tva_d1');
            $achat->FK_fait_generateur=1;
            $achat->FK_regime=1;
            $achat->FK_succursale=1;
            $achat->FK_type_payment=$request->input('Mpayement');
            $achat->FK_racines_1=1;
            $achat->FK_racines_2=1;
            $achat->FK_racines_3=1;
            $achat->FK_fournisseur=$request->input('frs');
            $achat->save();

               return response()->json([
                   'status' => 200,
                   'message' => 'Ajouter avec succès',
               ]);
           } 
         catch (\Exception $e) {
               return redirect()
                   ->back()
                   ->with('danger', 'Une erreur s\'est produite. Merci de contacter le service IT.')
                   ->withInput();
           }
        }
    public function Liste_FRS(Request $request)
    {
        $Liste_FRS = fournisseurs::  where('fournisseurs.deleted_at', '=', NULL)->orderBy("id", "desc")->get();

        return response()->json([
            'Liste_FRS' => $Liste_FRS
        ]);
    }
    public function Liste_Mpyement(Request $request)
    {
        $Liste_payment = type_payment::where('type_payments.deleted_at', '=', NULL)->orderBy("id", "desc")->get();

        return response()->json([
            'Liste_payment' => $Liste_payment
        ]);
    }
    public function Liste_Racine(Request $request)
    {
        
        $Liste_Racine = racine::where('racines.deleted_at', '=', NULL)->orderBy("id", "desc")->get();;

        return response()->json([
            'Liste_Racine' => $Liste_Racine
        ]);
    }
    public function get_FRS($id)
    {
      
        $get_FRS = fournisseurs::where('fournisseurs.id',$id)
        ->where('fournisseurs.deleted_at', '=', NULL)->first();

        return response()->json([
            'get_FRS' => $get_FRS
        ]);
    }
     public function get_racine($id)
    {
      
        $get_racine = racine::where('racines.id',$id)
        ->where('racines.deleted_at', '=', NULL)->first();

        return response()->json([
            'get_racine' => $get_racine
        ]);
    }
    public function get_achat($nfact)
    {
        $get_achat = achat::where('achats.N_facture',$nfact)
        ->where('achats.deleted_at', '=', NULL)->first();
        return response()->json([
            'get_achat' => $get_achat
        ]);
    }

}
