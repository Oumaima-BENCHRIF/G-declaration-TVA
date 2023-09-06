<?php

namespace App\Http\Controllers;

use App\Models\achat;
use App\Models\agence;
use App\Models\fournisseurs;
use App\Models\type_payment;
use App\Models\racine;
use App\Models\agences;
use App\Models\regime;
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
            $achat->MT_déduit=$request->input('mtd');
            $achat->TTC_1=$request->input('ttc1');
            $achat->TTC_2=$request->input('ttc2');
            $achat->TTC_3=$request->input('ttc3');
            $achat->Exercice=$request->input('Exercice');
            $achat->FK_fait_generateur=1;
            $achat->FK_regime=$request->input('periode');     
            $achat->FK_type_payment=$request->input('Mpayement');
            $achat->FK_racines_1=$request->input('racine');
            if($request->input('racine2')!='null'){
                $achat->FK_racines_2=$request->input('racine2');
            }
            if($request->input('racine3')!='null'){
                $achat->FK_racines_3=$request->input('racine3');
            }
         
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
    public function Liste_FRS(Request $requesregiminfot)
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
        ->where('achats.deleted_at', '=', NULL)->get();
        return response()->json([
            'get_achat' => $get_achat
        ]);
    } public function get_TBLachat($periode,$Exercice)
    {
        $get_TBLachat =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.name','type_payments.Nom_payment','racines.Num_racines')
        ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        ->join('regimes', 'regimes.id', 'achats.FK_racines_1')
        ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
        ->join('fait_generateurs', 'fait_generateurs.id', 'achats.FK_fait_generateur')
        ->join('racines', 'racines.id', 'achats.FK_racines_1')
        ->where('achats.FK_regime',1)
        ->where('achats.Exercice',2019)
        ->where('achats.deleted_at', '=', NULL)->get();
       
        return response()->json([
            'get_TBLachat' => $get_TBLachat
        ]);
    }
    public function get_achatbyID($id)
    {
      

        $get_achatb =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.id as idfrs','fournisseurs.name','type_payments.Nom_payment','type_payments.id as idp','racines.Num_racines')
        ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        ->join('regimes', 'regimes.id', 'achats.FK_racines_1')
        ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
        ->join('fait_generateurs', 'fait_generateurs.id', 'achats.FK_fait_generateur')
        ->join('racines', 'racines.id', 'achats.FK_racines_1')
        ->where('achats.id',$id)
        ->where('achats.deleted_at', '=', NULL)->first();
       
        return response()->json([
            'get_achatb' => $get_achatb
        ]);
      
    }

public function table_achat()
{

    $table_achat =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.name','type_payments.Nom_payment','racines.Num_racines')
    ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
    ->join('regimes', 'regimes.id', 'achats.FK_racines_1')
    ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
    ->join('fait_generateurs', 'fait_generateurs.id', 'achats.FK_fait_generateur')
    ->join('racines', 'racines.id', 'achats.FK_racines_1')
    ->where('fournisseurs.deleted_at', '=', NULL)->get();

    if ($table_achat) {
        return response()->json([
            "code" => 200,
            'table_achat' => $table_achat,
        ]);
    } else {
        return response()->json([
            "code" => 500,
            'message' => "Merci de Verifier votre connexion internet",
        ]);
    }


}
public function get_info()
{   $id=21;
    $get_info = agence::select()
    ->where('agences.id',$id)->first();
   $regime = regime::select('regimes.libelle')
    ->where('regimes.deleted_at', '=', NULL)
    ->where('regimes.id', '=',$get_info->FK_Regime)
    ->orderBy("id", "Asc")->get();
    $Liste_regimes = regime::where('regimes.deleted_at', '=', NULL)
    ->orderBy("id", "Asc")->get();
    return response()->json([
        'get_info' => $get_info,
        'regime' => $regime,
        'Liste_regimes' => $Liste_regimes
    ]);
  
}
public function Update(Request $request)
    {
       

        // try {

        //     $update_agence = agence::where('id', $request->update_id_agence)->first();
         
        //     $update_agence->ICE = $request->ICE;
        //     $update_agence->Email = $request->Email;
        //     $update_agence->Activite = $request->Activite;
        //     $update_agence->ID_Fiscale = $request->ID_Fiscale;
        //     $update_agence->Ville = $request->Ville;

          
        //     $update_agence->Tele = $request->Tele;
        //     $update_agence->Adresse = $request->Adresse;
        //     $update_agence->nom_succorsale = $request->nom_succorsale;
        //     $update_agence->Fax = $request->Fax;
        //     $update_agence->FK_Regime = $request->FK_Regime;
        //     $update_agence->FK_fait_generateurs = $request->FK_fait_generateurs;
        //     $update_agence->nomBD = $request->nomBD;

        //     $update_agence->save();

        //     return response()->json([
        //         'status' => 200,
        //         'messages' => 'Modification avec succès',
        //     ]);
        // } catch (\Exception $e) {

        //     return response()->json([
        //         'status' => 200,
        //         'Error' => 'Merci de vérifier la connexion internet, si non email_clienter le service IT',
        //     ]);
    //     // }
    // }
}
}
