<?php

namespace App\Http\Controllers;

use App\Models\achat;
use App\Models\agence;
use App\Models\fournisseurs;
use App\Models\type_payment;
use App\Models\racine;
use Illuminate\Support\Facades\DB;
use App\Models\regime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
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
            
            if($frs)
            {
                $frs->Designation=$request->input('desc');
                $frs->save();

            }else
            {
                $fournisseurs = new fournisseurs();
                $fournisseurs->ID_fiscale=$request->input('id_fiscal');
                $fournisseurs->NICE=$request->input('N_ICE');
                $fournisseurs->Designation=$request->input('desc');
                $fournisseurs->nomFournisseurs=$request->input('frs');
                $fournisseurs->save();
            } 
           
            $achat = new achat();
            $achat->N_facture=$request->input('n_fact');
            $achat->Date_facture=$request->input('date_fact');
            $achat->Date_payment=$request->input('date_p');
            $achat->Designation=$request->input('desc');
            $achat->M_TTC=$request->input('MTttc');
            $achat->Prorata=$request->input('prorata');
            $achat->TVA_deductible3=$request->input('tva_d3');
            $achat->TVA_deductible2=$request->input('tva_d2');
            $achat->TVA_deductible=$request->input('tva_d1');
            $achat->MT_déduit=$request->input('mtd');           
            $achat->Exercice=$request->input('Exercice');   
            $achat->FK_regime=$request->input('periode');     
            $achat->FK_type_payment=$request->input('Mpayement');
       
            if($request->input('taux1')==7)
            {
                $achat->Taux7=$request->input('taux1');
                $achat->TVA_7=$request->input('tva_1');
                $achat->M_HT_7=$request->input('MHT_1');
                $achat->TTC_7=$request->input('ttc1');
                if($request->input('racine2')!='null'){
                    $achat->FK_racines_7=$request->input('racine');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $achat->num_racine_7=$num->Num_racines;
            }
            if($request->input('taux2')==7)
            {
                $achat->Taux7=$request->input('taux2');
                $achat->TVA_7=$request->input('tva_2');
                $achat->M_HT_7=$request->input('MHT_2');
                $achat->TTC_7=$request->input('ttc2');
                if($request->input('racine2')!='null'){
                    $achat->FK_racines_7=$request->input('racine2');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine2'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $achat->num_racine_7=$num->Num_racines;

            }
            if($request->input('taux3')==7)
            {
                $achat->Taux7=$request->input('taux3');
                $achat->TVA_7=$request->input('tva_3');
                $achat->M_HT_7=$request->input('MHT_3');
                $achat->TTC_7=$request->input('ttc3');
                if($request->input('racine3')!='null'){
                    $achat->FK_racines_7=$request->input('racine3');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine3'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $achat->num_racine_7=$num->Num_racines;
            }
            if($request->input('taux1')==10)
            {
            $achat->Taux10=$request->input('taux1');
            $achat->TVA_10=$request->input('tva_1');
            $achat->M_HT_10=$request->input('MHT_1');
            $achat->TTC_10=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $achat->FK_racines_10=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_10=$num->Num_racines;
            }
            if($request->input('taux2')==10)
            {
            $achat->Taux10=$request->input('taux2');
            $achat->TVA_10=$request->input('tva_2');
            $achat->M_HT_10=$request->input('MHT_2');
            $achat->TTC_10=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $achat->FK_racines_10=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_10=$num->Num_racines;
            }  
            if($request->input('taux3')==10)
            {
            $achat->Taux10=$request->input('taux3');
            $achat->TVA_10=$request->input('tva_3');
            $achat->M_HT_10=$request->input('MHT_3');
            $achat->TTC_10=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $achat->FK_racines_10=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_10=$num->Num_racines;
            }

            if($request->input('taux1')==14)
            {
            $achat->Taux14=$request->input('taux1');
            $achat->TVA_14=$request->input('tva_1');
            $achat->M_HT_14=$request->input('MHT_1');
            $achat->TTC_14=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $achat->FK_racines_14=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_14=$num->Num_racines;
            }
            if($request->input('taux2')==14)
            {
            $achat->Taux14=$request->input('taux2');
            $achat->TVA_14=$request->input('tva_2');
            $achat->M_HT_14=$request->input('MHT_2');
            $achat->TTC_14=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $achat->FK_racines_14=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_14=$num->Num_racines;
            }  
            if($request->input('taux3')==14)
            {
            $achat->Taux14=$request->input('taux3');
            $achat->TVA_14=$request->input('tva_3');
            $achat->M_HT_14=$request->input('MHT_3');
            $achat->TTC_14=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $achat->FK_racines_14=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_14=$num->Num_racines;
            }
            if($request->input('taux1')==20)
            {
            $achat->Taux20=$request->input('taux1');
            $achat->TVA_20=$request->input('tva_1');
            $achat->M_HT_20=$request->input('MHT_1');
            $achat->TTC_20=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $achat->FK_racines_20=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_20=$num->Num_racines;
            }
            if($request->input('taux2')==20)
            {
            $achat->Taux20=$request->input('taux2');
            $achat->TVA_20=$request->input('tva_2');
            $achat->M_HT_20=$request->input('MHT_2');
            $achat->TTC_20=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $achat->FK_racines_20=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_20=$num->Num_racines;
            }  
            if($request->input('taux3')==20)
            {
            $achat->Taux20=$request->input('taux3');
            $achat->TVA_20=$request->input('tva_3');
            $achat->M_HT_20=$request->input('MHT_3');
            $achat->TTC_20=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $achat->FK_racines_20=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_20=$num->Num_racines;
            }
            $achat->dateSaisie=date('Y-m-d');
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
        
        $Liste_Racine = racine::where('racines.deleted_at', '=', NULL)->orderBy("id", "desc")->get();

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
        $taux = racine::select('racines.Taux')
        ->where('racines.id',$id)
        ->where('racines.deleted_at', '=', NULL)->first();
        return response()->json([
            'get_racine' => $get_racine,
            'taux'=>$taux
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
       
        // $get_TBLachat =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.nomFournisseurs','type_payments.Nom_payment')
        // ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        // ->join('regimes', 'regimes.id', 'achats.FK_regime')
        // ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment') 
      
        // ->where('achats.FK_regime',$periode)
        // ->where('achats.Exercice',$Exercice)
        // ->where('achats.deleted_at', '=', NULL)->get();




        $get_TBLachat =achat::select('achats.*','fournisseurs.NICE as NICE','fournisseurs.ID_fiscale as ID_fiscale','fournisseurs.nomFournisseurs as nomFournisseurs','type_payments.Nom_payment as Nom_payment')
        ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
        ->where('achats.FK_regime',$periode)
        ->where('achats.Exercice',$Exercice)
        ->where('achats.deleted_at', '=', NULL)
        ->get();
    
        $table_achat3=[];
    
    foreach ($get_TBLachat as $key => $achat) {
    
        if($achat->	Taux7!=null)
        {
            $table_achat2=new achat();
            $table_achat2->N_facture=$achat->N_facture;
            $table_achat2->Date_facture=$achat->Date_facture;
            $table_achat2->Date_payment=$achat->Date_payment;
            $table_achat2->Designation=$achat->Designation;
            $table_achat2->TVA_10=$achat->nomFournisseurs;
            $table_achat2->TVA_14=$achat->NICE;
            $table_achat2->TVA_20=$achat->ID_fiscale;
            $table_achat2->M_HT_20=$achat->Nom_payment;
            $table_achat2->M_TTC=$achat->M_TTC;
            $table_achat2->Prorata=$achat->Prorata;
            $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
            $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
            $table_achat2->TVA_deductible=$achat->TVA_deductible;
            $table_achat2->MT_déduit=$achat->MT_déduit;           
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux7;
            $table_achat2->TVA_7=$achat->TVA_7;
            $table_achat2->M_HT_7=$achat->M_HT_7;
            $table_achat2->TTC_7=$achat->TTC_7;
            $table_achat2->FK_racines_7=$achat->FK_racines_7;
            $table_achat2->num_racine_7=$achat->num_racine_7;
            $table_achat2->dateSaisie=$achat->dateSaisie;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
            $table_achat3[]=$table_achat2;
        }
        if($achat->	Taux10!=null)
        {
            $table_achat2=new achat();
            $table_achat2->N_facture=$achat->N_facture;
            $table_achat2->Date_facture=$achat->Date_facture;
            $table_achat2->Date_payment=$achat->Date_payment;
            $table_achat2->Designation=$achat->Designation;
            $table_achat2->TVA_10=$achat->nomFournisseurs;
            $table_achat2->TVA_14=$achat->NICE;
            $table_achat2->TVA_20=$achat->ID_fiscale;
            $table_achat2->M_HT_20=$achat->Nom_payment;
            $table_achat2->M_TTC=$achat->M_TTC;
            $table_achat2->Prorata=$achat->Prorata;
            $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
            $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
            $table_achat2->TVA_deductible=$achat->TVA_deductible;
            $table_achat2->MT_déduit=$achat->MT_déduit;           
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux10;
            $table_achat2->TVA_7=$achat->TVA_10;
            $table_achat2->M_HT_7=$achat->M_HT_10;
            $table_achat2->TTC_7=$achat->TTC_10;
            $table_achat2->FK_racines_7=$achat->FK_racines_10;
            $table_achat2->num_racine_7=$achat->num_racine_10;
            $table_achat2->dateSaisie=$achat->dateSaisie;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
            $table_achat3[]=$table_achat2;
        }
        if($achat->	Taux14!=null)
        {
            $table_achat2=new achat();
            $table_achat2->N_facture=$achat->N_facture;
            $table_achat2->Date_facture=$achat->Date_facture;
            $table_achat2->Date_payment=$achat->Date_payment;
            $table_achat2->Designation=$achat->Designation;
            $table_achat2->TVA_10=$achat->nomFournisseurs;
            $table_achat2->TVA_14=$achat->NICE;
            $table_achat2->TVA_20=$achat->ID_fiscale;
            $table_achat2->M_HT_20=$achat->Nom_payment;
            $table_achat2->M_TTC=$achat->M_TTC;
            $table_achat2->Prorata=$achat->Prorata;
            $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
            $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
            $table_achat2->TVA_deductible=$achat->TVA_deductible;
            $table_achat2->MT_déduit=$achat->MT_déduit;           
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux14;
            $table_achat2->TVA_7=$achat->TVA_14;
            $table_achat2->M_HT_7=$achat->M_HT_14;
            $table_achat2->TTC_7=$achat->TTC_14;
            $table_achat2->FK_racines_7=$achat->FK_racines_14;
            $table_achat2->num_racine_7=$achat->num_racine_14;
            $table_achat2->dateSaisie=$achat->dateSaisie;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
            $table_achat3[]=$table_achat2;
        }
        if($achat->	Taux20!=null)
        {
            $table_achat2=new achat();
            $table_achat2->N_facture=$achat->N_facture;
            $table_achat2->Date_facture=$achat->Date_facture;
            $table_achat2->Date_payment=$achat->Date_payment;
            $table_achat2->Designation=$achat->Designation;
            $table_achat2->TVA_10=$achat->nomFournisseurs;
            $table_achat2->TVA_14=$achat->NICE;
            $table_achat2->TVA_20=$achat->ID_fiscale;
            $table_achat2->M_HT_20=$achat->Nom_payment;
            $table_achat2->M_TTC=$achat->M_TTC;
            $table_achat2->Prorata=$achat->Prorata;
            $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
            $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
            $table_achat2->TVA_deductible=$achat->TVA_deductible;
            $table_achat2->MT_déduit=$achat->MT_déduit;           
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux20;
            $table_achat2->TVA_7=$achat->TVA_20;
            $table_achat2->M_HT_7=$achat->M_HT_20;
            $table_achat2->TTC_7=$achat->TTC_20;
            $table_achat2->FK_racines_7=$achat->FK_racines_20;
            $table_achat2->num_racine_7=$achat->num_racine_20;
            $table_achat2->dateSaisie=$achat->dateSaisie;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
            $table_achat3[]=$table_achat2;
        }
    }
    
    $table_achat3 = collect($table_achat3)->sortBy('num_racine_7')->values()->all();
    
    
       
        return response()->json([
            'get_TBLachat' => $table_achat3
        ]);
    }
    public function get_achatbyID($id)
    {
       
        $get_achatb =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.id as idfrs','fournisseurs.nomFournisseurs','type_payments.Nom_payment','type_payments.id as idp')
        ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
        ->where('achats.id',$id)
        ->where('achats.deleted_at', '=', NULL)->first();
  
        return response()->json([
            'get_achatb' => $get_achatb
        ]);
      
    }

public function table_achat($periode,$Exercice)
{

    $table_achat =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.nomFournisseurs as nomFournisseur','type_payments.Nom_payment','racines.Num_racines as Num_racines,type_payments.Nom_payment as Nom_payment')
    ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
    ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
    ->join('racines', 'racines.id', 'achats.FK_racines_7')
    ->where('achats.FK_regime',$periode)
    ->where('achats.Exercice',$Exercice)
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
    $get_info = agence::select('agences.*','regimes.libelle as libelle')
    ->join('regimes', 'regimes.id', 'agences.FK_Regime')
    ->where('agences.id',$id)->first();
    $libelle=$get_info->libelle;
    $targetDate=date('Y-m-d');
    $dayMonth = date('m-d', strtotime($targetDate));
    
    $regime2 = regime::select('regimes.id')
    ->where('regimes.libelle', '=',$libelle)
    ->where(function ($query) use ($dayMonth) {
        $query->whereRaw('DATE_FORMAT(regimes.DU, "%m-%d") <= ?', [$dayMonth])
            ->whereRaw('DATE_FORMAT(regimes.AU, "%m-d") >= ?', [$dayMonth]);
    })->first();
  
   $regime = regime::select('regimes.libelle')
    ->where('regimes.deleted_at', '=', NULL)
    ->where('regimes.id', '=',$get_info->FK_Regime)
    ->orderBy("id", "Asc")->get();
    $Liste_regimes = regime::where('regimes.deleted_at', '=', NULL)
    ->orderBy("id", "Asc")->get();
    return response()->json([
        'get_info' => $get_info,
        'regime' => $regime,
        'Liste_regimes' => $Liste_regimes,
        'periode'=>$regime2->id
    ]);
   
}
public function Update(Request $request)
    {
    

        try {
            $achat = achat::where('achats.id',$request->input('id'))
            ->where('achats.deleted_at', '=', NULL)->first(); 
            $achat->N_facture=$request->input('n_fact');
            $achat->Date_facture=$request->input('date_fact');
            $achat->Date_payment=$request->input('date_p');
            $achat->Designation=$request->input('desc');
            $achat->M_TTC=$request->input('MTttc');
            $achat->Prorata=$request->input('prorata');
            $achat->TVA_deductible3=$request->input('tva_d3');
            $achat->TVA_deductible2=$request->input('tva_d2');
            $achat->TVA_deductible=$request->input('tva_d1');
            $achat->MT_déduit=$request->input('mtd');           
            $achat->Exercice=$request->input('Exercice');   
            $achat->FK_regime=$request->input('periode');     
            $achat->FK_type_payment=$request->input('Mpayement');
            if($request->input('Taux1')==7)
            {
                $achat->Taux7=$request->input('Taux1');
                $achat->TVA_7=$request->input('tva_1');
                $achat->M_HT_7=$request->input('MHT_1');
                $achat->TTC_7=$request->input('ttc1');
                if($request->input('racine2')!='null'){
                    $achat->FK_racines_7=$request->input('racine');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $achat->num_racine_7=$num->Num_racines;
            }
            if($request->input('Taux2')==7)
            {
                $achat->Taux7=$request->input('Taux2');
                $achat->TVA_7=$request->input('tva_2');
                $achat->M_HT_7=$request->input('MHT_2');
                $achat->TTC_7=$request->input('ttc2');
                if($request->input('racine2')!='null'){
                    $achat->FK_racines_7=$request->input('racine2');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine2'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $achat->num_racine_7=$num->Num_racines;

            }
            if($request->input('Taux3')==7)
            {
                $achat->Taux7=$request->input('Taux3');
                $achat->TVA_7=$request->input('tva_3');
                $achat->M_HT_7=$request->input('MHT_3');
                $achat->TTC_7=$request->input('ttc3');
                if($request->input('racine3')!='null'){
                    $achat->FK_racines_7=$request->input('racine3');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine3'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $achat->num_racine_7=$num->Num_racines;
            }
            if($request->input('Taux1')==10)
            {
            $achat->Taux10=$request->input('Taux1');
            $achat->TVA_10=$request->input('tva_1');
            $achat->M_HT_10=$request->input('MHT_1');
            $achat->TTC_10=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $achat->FK_racines_10=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_10=$num->Num_racines;
            }
            if($request->input('Taux2')==10)
            {
            $achat->Taux10=$request->input('Taux2');
            $achat->TVA_10=$request->input('tva_2');
            $achat->M_HT_10=$request->input('MHT_2');
            $achat->TTC_10=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $achat->FK_racines_10=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_10=$num->Num_racines;
            }  
            if($request->input('Taux3')==10)
            {
            $achat->Taux10=$request->input('Taux3');
            $achat->TVA_10=$request->input('tva_3');
            $achat->M_HT_10=$request->input('MHT_3');
            $achat->TTC_10=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $achat->FK_racines_10=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_10=$num->Num_racines;
            }

            if($request->input('Taux1')==14)
            {
            $achat->Taux14=$request->input('Taux1');
            $achat->TVA_14=$request->input('tva_1');
            $achat->M_HT_14=$request->input('MHT_1');
            $achat->TTC_14=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $achat->FK_racines_14=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_14=$num->Num_racines;
            }
            if($request->input('Taux2')==14)
            {
            $achat->Taux14=$request->input('Taux2');
            $achat->TVA_14=$request->input('tva_2');
            $achat->M_HT_14=$request->input('MHT_2');
            $achat->TTC_14=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $achat->FK_racines_14=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_14=$num->Num_racines;
            }  
            if($request->input('Taux3')==14)
            {
            $achat->Taux14=$request->input('Taux3');
            $achat->TVA_14=$request->input('tva_3');
            $achat->M_HT_14=$request->input('MHT_3');
            $achat->TTC_14=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $achat->FK_racines_14=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_14=$num->Num_racines;
            }
            if($request->input('Taux1')==20)
            {
            $achat->Taux20=$request->input('Taux1');
            $achat->TVA_20=$request->input('tva_1');
            $achat->M_HT_20=$request->input('MHT_1');
            $achat->TTC_20=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $achat->FK_racines_20=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_20=$num->Num_racines;
            }
            if($request->input('Taux2')==20)
            {
            $achat->Taux20=$request->input('Taux2');
            $achat->TVA_20=$request->input('tva_2');
            $achat->M_HT_20=$request->input('MHT_2');
            $achat->TTC_20=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $achat->FK_racines_20=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_20=$num->Num_racines;
            }  
            if($request->input('Taux3')==20)
            {
            $achat->Taux20=$request->input('Taux3');
            $achat->TVA_20=$request->input('tva_3');
            $achat->M_HT_20=$request->input('MHT_3');
            $achat->TTC_20=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $achat->FK_racines_20=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_20=$num->Num_racines;
            }
            $achat->FK_fournisseur=$request->input('frs');
            
            $achat->save();
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
    function get_regime($exercice)
    {
        $regime = regime::select('regimes.libelle')
        ->join('achats', 'regimes.id','achats.FK_regime')
        ->where('achats.Exercice', '=',$exercice)->first();
        $Liste_regimes = regime::where('regimes.deleted_at', '=', NULL)
        ->orderBy("id", "Asc")->get();
        return response()->json([
            'regime' => $regime,
            'Liste_regimes'=>$Liste_regimes
           
        ]);
     }


 public function destroy(Request $request)
{
    try {
        // dd($request->delete_id_achat);
        $check = achat::where('id', $request->delete_id_achat)->first();
        
        if ($check != null) {
            $niveauurgence = achat::find($request->delete_id_achat);
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

public function generatePDF($periode,$Exercice)
{
    $id=21;
    $get_info = agence::select('agences.*','fait_generateurs.id as idf','fait_generateurs.libelle')
    ->join('fait_generateurs', 'fait_generateurs.id', 'agences.FK_fait_generateurs')
    ->where('agences.id',$id)
    ->first();

    $table_achat =achat::select('achats.*','fournisseurs.NICE as NICE','fournisseurs.ID_fiscale as ID_fiscale','fournisseurs.nomFournisseurs as nomFournisseurs','type_payments.Nom_payment as Nom_payment')
    ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
    ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
    ->where('achats.FK_regime',$periode)
    ->where('achats.Exercice',$Exercice)
    ->where('achats.deleted_at', '=', NULL)
    ->get();
     $SAMTVA = achat::select(
        DB::raw('SUM(achats.TVA_7) as STVA_7'),
        DB::raw('SUM(achats.TVA_10) as STVA_10'),
        DB::raw('SUM(achats.TVA_14) as STVA_14'),
        DB::raw('SUM(achats.TVA_20) as STVA_20')
    )
    ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
    ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
    ->where('achats.FK_regime',$periode)
    ->where('achats.Exercice',$Exercice)
    ->where('achats.deleted_at', '=', NULL)
    ->get();
    // dd($SAMTVA);
    $table_achat3=[];

foreach ($table_achat as $key => $achat) {

    if($achat->	Taux7!=null)
    {
        $table_achat2=new achat();
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
        $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
        $table_achat2->TVA_deductible=$achat->TVA_deductible;
        $table_achat2->MT_déduit=$achat->MT_déduit;           
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux7;
        $table_achat2->TVA_7=$achat->TVA_7;
        $table_achat2->M_HT_7=$achat->M_HT_7;
        $table_achat2->TTC_7=$achat->TTC_7;
        $table_achat2->FK_racines_7=$achat->FK_racines_7;
        $table_achat2->num_racine_7=$achat->num_racine_7;
        $table_achat2->dateSaisie=$achat->dateSaisie;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $table_achat3[]=$table_achat2;
    }
    if($achat->	Taux10!=null)
    {
        $table_achat2=new achat();
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
        $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
        $table_achat2->TVA_deductible=$achat->TVA_deductible;
        $table_achat2->MT_déduit=$achat->MT_déduit;           
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux10;
        $table_achat2->TVA_7=$achat->TVA_10;
        $table_achat2->M_HT_7=$achat->M_HT_10;
        $table_achat2->TTC_7=$achat->TTC_10;
        $table_achat2->FK_racines_7=$achat->FK_racines_10;
        $table_achat2->num_racine_7=$achat->num_racine_10;
        $table_achat2->dateSaisie=$achat->dateSaisie;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $table_achat3[]=$table_achat2;
    }
    if($achat->	Taux14!=null)
    {
        $table_achat2=new achat();
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
        $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
        $table_achat2->TVA_deductible=$achat->TVA_deductible;
        $table_achat2->MT_déduit=$achat->MT_déduit;           
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux14;
        $table_achat2->TVA_7=$achat->TVA_14;
        $table_achat2->M_HT_7=$achat->M_HT_14;
        $table_achat2->TTC_7=$achat->TTC_14;
        $table_achat2->FK_racines_7=$achat->FK_racines_14;
        $table_achat2->num_racine_7=$achat->num_racine_14;
        $table_achat2->dateSaisie=$achat->dateSaisie;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $table_achat3[]=$table_achat2;
    }
    if($achat->	Taux20!=null)
    {
        $table_achat2=new achat();
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_deductible3=$achat->TVA_deductible3;
        $table_achat2->TVA_deductible2=$achat->TVA_deductible2;
        $table_achat2->TVA_deductible=$achat->TVA_deductible;
        $table_achat2->MT_déduit=$achat->MT_déduit;           
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux20;
        $table_achat2->TVA_7=$achat->TVA_20;
        $table_achat2->M_HT_7=$achat->M_HT_20;
        $table_achat2->TTC_7=$achat->TTC_20;
        $table_achat2->FK_racines_7=$achat->FK_racines_20;
        $table_achat2->num_racine_7=$achat->num_racine_20;
        $table_achat2->dateSaisie=$achat->dateSaisie;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $table_achat3[]=$table_achat2;
    }
}

$table_achat3 = collect($table_achat3)->sortBy('num_racine_7')->values()->all();


    $pdf = PDF::loadView('Etat_Achat',[
        'table_achat'=>$table_achat3,
        'get_info'=>$get_info,
        'SAMTVA'=>$SAMTVA
    ])->setPaper('a4', 'landscape');;
    return $pdf->stream('relevé_deduction.pdf');
   
}
}

