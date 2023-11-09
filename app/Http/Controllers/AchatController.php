<?php

namespace App\Http\Controllers;

use App\Models\achat;
use App\Models\agence;
use App\Models\fournisseurs;
use App\Models\type_payment;
use App\Models\racine;
use Illuminate\Support\Facades\DB;
use App\Models\regime;
use App\Models\CompteCharges;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PHPExcel;
use PHPExcel_IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            $achat = new achat();
            if(!$frs)
            {
                $fournisseurs = new fournisseurs();
                $fournisseurs->ID_fiscale=$request->input('id_fiscal');
                $fournisseurs->NICE=$request->input('N_ICE');
                $fournisseurs->Designation=$request->input('desc');
                $fournisseurs->nomFournisseurs=$request->input('frs');
                $fournisseurs->Num_compte_comptable=$request->input('n_compt');
                $fournisseurs->save();
                $achat->FK_fournisseur=$fournisseurs->id;
               
            }else
            {
                $frs->Designation=$request->input('desc');
                $achat->FK_fournisseur=$frs->id;
                $frs->save();

            }   
        //     $order=achat::select('achats.order','achats.order')
        //     ->where('achats.deleted_at', '=', NULL)
        //     ->where('achats.Exercice',$request->input('Exercice'))
        //     ->where('achats.FK_regime',$request->input('periode')) ->latest()
        //     ->first(); 
           
        //  if($order)
        //        {
        //         $achat->order=$order->order+1;
        //        }else
        //        {
        //      $achat->order=1;
        //      }

            $achat->N_facture=$request->input('n_fact');
            $achat->Date_facture=$request->input('date_fact');
            $achat->Date_payment=$request->input('date_p');
            $achat->Designation=$request->input('desc');
            $achat->M_TTC=$request->input('MTttc');
            $achat->FK_fait_generateur=$request->input('faitG');   
            $achat->Exercice=$request->input('Exercice');   
            $achat->FK_regime=$request->input('periode');     
            $achat->FK_type_payment=$request->input('Mpayement');
            $achat->FK_Ccharge=$request->input('charge');
            if($request->input('prorata')!=''){
                $achat->Prorata=$request->input('prorata');
            }else{
                $achat->Prorata=100;
            }
            if($request->input('taux1')==7)
            {
                $achat->Taux7=$request->input('taux1');
                $achat->TVA_7=$request->input('tva_1');
                $achat->M_HT_7=$request->input('MHT_1');
                $achat->TTC_7=$request->input('ttc1');
                $achat->TVA_d7=$request->input('tva_d1');
                if($request->input('racine')!='null'){
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
                $achat->TVA_d7=$request->input('tva_d2');
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
                $achat->TVA_d7=$request->input('tva_d3');

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
             $achat->TVA_d10=$request->input('tva_d1');
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
             $achat->TVA_d10=$request->input('tva_d2');
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
             $achat->TVA_d10=$request->input('tva_d3');
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
             $achat->TVA_d14=$request->input('tva_d1');
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
             $achat->TVA_d14=$request->input('tva_d2');
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
             $achat->TVA_d14=$request->input('tva_d3');
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
             $achat->TVA_d20=$request->input('tva_d1');
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
             $achat->TVA_d20=$request->input('tva_d2');
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
             $achat->TVA_d20=$request->input('tva_d3');
             $achat->TTC_20=$request->input('ttc3');
             if($request->input('racine3')!='null'){
                $achat->FK_racines_20=$request->input('racine3');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine3'))
             ->where('racines.deleted_at', '=', NULL)->first();
          
             $achat->num_racine_20=$num->Num_racines;
            }    
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
        $Liste_payment = type_payment::where('type_payments.deleted_at', '=', NULL)->orderBy("Num_payment", "asc")->get();

        return response()->json([
            'Liste_payment' => $Liste_payment
        ]);
    }
    public function Liste_Racine(Request $request)
    {
        
        $Liste_Racine = racine::where('racines.deleted_at', '=', NULL)->orderBy("Num_racines", "asc")->get();

        return response()->json([
            'Liste_Racine' => $Liste_Racine
        ]);
    }
    public function Liste_Ccharge(Request $request)
    {
        
        $Liste_Ccharge = CompteCharges::where('compte_charges.deleted_at', '=', NULL)->orderBy("N_compte_charges_immob", "asc")->get();

        return response()->json([
            'Liste_Ccharge' => $Liste_Ccharge
        ]);
    }
    public function get_FRS($id)
    { 
        $pattern = '/\D/'; // \D matches any non-digit character

        if (preg_match($pattern, $id)) {
            $id=0;
        } 
        $get_FRS = fournisseurs::whereRaw('fournisseurs.id = ?', [$id])
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
        $totalHT=0;
        $totalTTC=0;
        $totalTVA=0;
       $ord=1;
       foreach ($get_TBLachat as $key => $achat) {
    
        if($achat->	Taux7!=null)
        {
            $table_achat2=new achat();
            $table_achat2->order=$ord;
            $table_achat2->id=$achat->id;
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
            $table_achat2->TVA_d7=$achat->TVA_d7;  
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux7;
            $table_achat2->TVA_7=$achat->TVA_7;
        $totalTVA=$totalTVA+$achat->TVA_7;
            $table_achat2->M_HT_7=$achat->M_HT_7;
        $totalHT=$totalHT+$achat->M_HT_7;
            $table_achat2->TTC_7=$achat->TTC_7;
        $totalTTC=$totalTTC+$achat->TTC_7;
            $table_achat2->FK_racines_7=$achat->FK_racines_7;
            $table_achat2->num_racine_7=$achat->num_racine_7;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
           
            $table_achat3[]=$table_achat2;
            $ord=$ord+1;
        }
        if($achat->	Taux10!=null)
        {
            $table_achat2=new achat();
            $table_achat2->order=$ord;
            $table_achat2->id=$achat->id;
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
            $table_achat2->TVA_d7=$achat->TVA_d10;
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux10;
            $table_achat2->TVA_7=$achat->TVA_10;
        $totalTVA=$totalTVA+$achat->TVA_10;
            $table_achat2->M_HT_7=$achat->M_HT_10;
        $totalHT=$totalHT+$achat->M_HT_10;
            $table_achat2->TTC_7=$achat->TTC_10;
        $totalTTC=$totalTTC+$achat->TTC_10;
            $table_achat2->FK_racines_7=$achat->FK_racines_10;
            $table_achat2->num_racine_7=$achat->num_racine_10;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
           
            $table_achat3[]=$table_achat2;
            $ord=$ord+1;
        }
        if($achat->	Taux14!=null)
        {
            $table_achat2=new achat();
            $table_achat2->order=$ord;
            $table_achat2->id=$achat->id;
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
            $table_achat2->TVA_d7=$achat->TVA_d14;
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux14;
            $table_achat2->TVA_7=$achat->TVA_14;
        $totalTVA=$totalTVA+$achat->TVA_14;
            $table_achat2->M_HT_7=$achat->M_HT_14;
        $totalHT=$totalHT+$achat->M_HT_14;
            $table_achat2->TTC_7=$achat->TTC_14;
        $totalTTC=$totalTTC+$achat->TTC_14;
            $table_achat2->FK_racines_7=$achat->FK_racines_14;
            $table_achat2->num_racine_7=$achat->num_racine_14;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
          
            $table_achat3[]=$table_achat2;
            $ord=$ord+1;
        }
        if($achat->	Taux20!=null)
        {
            $table_achat2=new achat();
            $table_achat2->order=$ord;
            $table_achat2->id=$achat->id;
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
            $table_achat2->TVA_d7=$achat->TVA_d20;           
            $table_achat2->Exercice=$achat->Exercice;   
            $table_achat2->FK_regime=$achat->FK_regime;     
            $table_achat2->FK_type_payment=$achat->FK_type_payment;
            $table_achat2->Taux7=$achat->Taux20;
            $table_achat2->TVA_7=$achat->TVA_20;
        $totalTVA=$totalTVA+$achat->TVA_20;
            $table_achat2->M_HT_7=$achat->M_HT_20;
        $totalHT=$totalHT+$achat->M_HT_20;
            $table_achat2->TTC_7=$achat->TTC_20;
        $totalTTC=$totalTTC+$achat->TTC_20;
            $table_achat2->FK_racines_7=$achat->FK_racines_20;
            $table_achat2->num_racine_7=$achat->num_racine_20;
            $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
           
            $table_achat3[]=$table_achat2;
            $ord=$ord+1;
        }
     }
    
       $table_achat3 = collect($table_achat3)->sortBy('num_racine_7')->values()->all();
        $totalHT=number_format($totalHT, 2);
        $totalTTC=number_format($totalTTC, 2);
        $totalTVA=number_format($totalTVA, 2);
    
       
        return response()->json([
            'get_TBLachat' => $table_achat3,
            'totalHT' => $totalHT,
            'totalTTC' => $totalTTC,
            'totalTVA' => $totalTVA,
        ]);
    }
    public function get_achatbyID($id)
    {
       
        $get_achatb =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.id as idfrs','fournisseurs.nomFournisseurs','fournisseurs.Num_compte_comptable','type_payments.Nom_payment','type_payments.id as idp')
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
{   $id=1;
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



            $frs=fournisseurs::select('fournisseurs.*')
            ->where('fournisseurs.deleted_at', '=', NULL)
            ->where('fournisseurs.id',$request->input('frs'))->first();
            if(!$frs)
            {
                $fournisseurs = new fournisseurs();
                $fournisseurs->ID_fiscale=$request->input('id_fiscal');
                $fournisseurs->NICE=$request->input('N_ICE');
                $fournisseurs->Designation=$request->input('desc');
                $fournisseurs->nomFournisseurs=$request->input('frs');
                $fournisseurs->Num_compte_comptable=$request->input('n_compt');
                $fournisseurs->save();
                $achat->FK_fournisseur=$fournisseurs->id;
               
            }else
            {
                $frs->Designation=$request->input('desc');
          
                $frs->save();

            }   


            $achat->N_facture=$request->input('n_fact');
            $achat->Date_facture=$request->input('date_fact');
            $achat->Date_payment=$request->input('date_p');
            $achat->Designation=$request->input('desc');
            $achat->M_TTC=$request->input('MTttc');
            $achat->Prorata=$request->input('prorata');  
            $achat->Exercice=$request->input('Exercice');   
            $achat->FK_regime=$request->input('periode');     
            $achat->FK_type_payment=$request->input('Mpayement');
          
            $achat->FK_Ccharge=$request->input('charge');

            if($request->input('Taux1')==7)
            {
                $achat->Taux7=$request->input('Taux1');
                $achat->TVA_7=$request->input('tva_1');
                $achat->M_HT_7=$request->input('MHT_1');
                $achat->TTC_7=$request->input('ttc1');
                $achat->TVA_d7=$request->input('tva_d1');
                if($request->input('racine')!='null'){
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
                $achat->TVA_d7=$request->input('tva_d2');
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
                $achat->TVA_d7=$request->input('tva_d3');            
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
            $achat->TVA_d10=$request->input('tva_d1');
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
            $achat->TVA_d10=$request->input('tva_d2');

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
            $achat->TVA_d10=$request->input('tva_d3');

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
            $achat->TVA_d14=$request->input('tva_d1');

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
            $achat->TVA_d14=$request->input('tva_d2');

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
            $achat->TVA_d14=$request->input('tva_d3');

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
            $achat->TVA_d20=$request->input('tva_d1');

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
            $achat->TVA_d20=$request->input('tva_d2');
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
            $achat->TVA_d20=$request->input('tva_d3');
            if($request->input('racine3')!='null'){
                $achat->FK_racines_20=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $achat->num_racine_20=$num->Num_racines;
            }
            if($request->input('Taux4')==20)
            {

          
            $achat->Taux20=$request->input('Taux4');
            $achat->TVA_20=$request->input('tva_4');
            $achat->M_HT_20=$request->input('MHT_4');
            $achat->TTC_20=$request->input('ttc4');
            $achat->TVA_d20=$request->input('tva_d4');
            if($request->input('racine4')!='null'){
                $achat->FK_racines_20=$request->input('racine4');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine4'))
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

     function get_regimeByid($id)
     {
         $regime = regime::select('regimes.*')
         ->where('regimes.id', '=',$id)->first();
      
         return response()->json([
             'regime' => $regime,  
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
    $id=1;
    $get_info = agence::select('agences.*','fait_generateurs.id as idf','fait_generateurs.libelle')
    ->join('fait_generateurs', 'fait_generateurs.id', 'agences.FK_fait_generateurs')
    ->where('agences.id',$id)
    ->first();
    $regime = regime::select('regimes.*')
    ->where('regimes.deleted_at', '=', NULL)
    ->where('regimes.id', '=',$periode)
    ->orderBy("id", "Asc")->first();
    $DU = $regime->DU;
    $AU = $regime->AU;
    list($currentYear, $month, $day) = sscanf($DU, "%d-%d-%d");
    $newDate = sprintf("%02d/%02d/%d", $day, $month, $Exercice);
    list($currentYear, $month, $day) = sscanf($AU, "%d-%d-%d");
    $newDate2 = sprintf("%02d/%02d/%d", $day, $month, $Exercice);
    //  list($Exercice, $month, $day) = explode("-", $DU);
    //  $DUa = date("$Exercice-$month-$day", strtotime($DU));
    //  list($Exercice, $month, $day) = explode("-", $AU);
    //  $AUa = date("$Exercice-$month-$day", strtotime($AU));



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
    $ord=1;
 foreach ($table_achat as $key => $achat) {

    if($achat->	Taux7!=null)
    {
        $racine = racine::select('racines.*')
        ->where('racines.id',$achat->FK_racines_7)
        ->where('racines.deleted_at', '=', NULL)->first();
   
        $table_achat2=new achat();
        $table_achat2->id=$achat->id;
        $table_achat2->order=$ord;
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_HT_14=$racine->Nom_racines;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_d7e=$achat->TVA_d7;
        $table_achat2->MT_déduit=$achat->MT_déduit;           
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux7;
        $table_achat2->TVA_7=$achat->TVA_7;
        $table_achat2->M_HT_7=$achat->M_HT_7;
        $table_achat2->TTC_7=$achat->TTC_7;
        $table_achat2->FK_racines_7=$achat->FK_racines_7;
        $table_achat2->num_racine_7=$racine->Num_racines;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $cat = racine::select('racines.categorie')
        ->where('racines.id',$achat->FK_racines_7)
        ->where('racines.deleted_at', '=', NULL)->first();
        $table_achat2->TTC_10=$cat->categorie;
        // dd($cat);
        $table_achat3[]=$table_achat2;
        $ord=$ord+1;
    }
    if($achat->	Taux10!=null)
    {
        $racine = racine::select('racines.*')
        ->where('racines.id',$achat->FK_racines_10)
        ->where('racines.deleted_at', '=', NULL)->first();
        $table_achat2=new achat();
        $table_achat2->id=$achat->id;
        $table_achat2->order=$ord;
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_HT_14=$racine->Nom_racines;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_d7=$achat->TVA_d10;
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux10;
        $table_achat2->TVA_7=$achat->TVA_10;
        $table_achat2->M_HT_7=$achat->M_HT_10;
        $table_achat2->TTC_7=$achat->TTC_10;
        $table_achat2->FK_racines_7=$achat->FK_racines_10;
        $table_achat2->num_racine_7=$racine->Num_racines;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $cat = racine::select('racines.categorie')
        ->where('racines.id',$achat->FK_racines_10)
        ->where('racines.deleted_at', '=', NULL)->first();
        $table_achat2->TTC_10=$cat->categorie;
        // dd($cat);
        $table_achat3[]=$table_achat2;
        $ord=$ord+1;
    }
    if($achat->	Taux14!=null)
    {
        $racine = racine::select('racines.*')
        ->where('racines.id',$achat->FK_racines_14)
        ->where('racines.deleted_at', '=', NULL)->first();
        $table_achat2=new achat();
        $table_achat2->id=$achat->id;
        $table_achat2->order=$ord;
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_HT_14=$racine->Nom_racines;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_d7=$achat->TVA_d14;
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux14;
        $table_achat2->TVA_7=$achat->TVA_14;
        $table_achat2->M_HT_7=$achat->M_HT_14;
        $table_achat2->TTC_7=$achat->TTC_14;
        $table_achat2->FK_racines_7=$achat->FK_racines_14;
        $table_achat2->num_racine_7=$racine->Num_racines;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $cat = racine::select('racines.categorie')
        ->where('racines.id',$achat->FK_racines_14)
        ->where('racines.deleted_at', '=', NULL)->first();
        $table_achat2->TTC_10=$cat->categorie;
        // dd($cat);
        $ord=$ord+1;
        $table_achat3[]=$table_achat2;

    }
    if($achat->	Taux20!=null)
    {
        $racine = racine::select('racines.*')
        ->where('racines.id',$achat->FK_racines_20)
        ->where('racines.deleted_at', '=', NULL)->first();
        $table_achat2=new achat();
        $table_achat2->id=$achat->id;
        $table_achat2->order=$ord;
        $table_achat2->N_facture=$achat->N_facture;
        $table_achat2->Date_facture=$achat->Date_facture;
        $table_achat2->Date_payment=$achat->Date_payment;
        $table_achat2->Designation=$achat->Designation;
        $table_achat2->TVA_10=$achat->nomFournisseurs;
        $table_achat2->TVA_14=$achat->NICE;
        $table_achat2->TVA_20=$achat->ID_fiscale;
        $table_achat2->M_HT_20=$achat->Nom_payment;
        $table_achat2->M_HT_14=$racine->Nom_racines;
        $table_achat2->M_TTC=$achat->M_TTC;
        $table_achat2->Prorata=$achat->Prorata;
        $table_achat2->TVA_d7=$achat->TVA_d20;           
        $table_achat2->Exercice=$achat->Exercice;   
        $table_achat2->FK_regime=$achat->FK_regime;     
        $table_achat2->FK_type_payment=$achat->FK_type_payment;
        $table_achat2->Taux7=$achat->Taux20;
        $table_achat2->TVA_7=$achat->TVA_20;
        $table_achat2->M_HT_7=$achat->M_HT_20;
        $table_achat2->TTC_7=$achat->TTC_20;
        $table_achat2->FK_racines_7=$achat->FK_racines_20;
        $table_achat2->num_racine_7=$racine->Num_racines;
        $table_achat2->FK_fournisseur=$achat->FK_fournisseur;
        $cat = racine::select('racines.categorie')
        ->where('racines.id',$achat->FK_racines_20)
        ->where('racines.deleted_at', '=', NULL)->first();
        $table_achat2->TTC_10=$cat->categorie;
// dd($cat);
        $table_achat3[]=$table_achat2;
        $ord=$ord+1;
    }
 }

 $table_achat3 = collect($table_achat3)->sortBy('num_racine_7')->values()->all();


    $pdf = PDF::loadView('Etat_Achat',[
        'table_achat'=>$table_achat3,
        'get_info'=>$get_info,
        'SAMTVA'=>$SAMTVA,
        'Exercice'=>$Exercice,
        'DU'=>$newDate,
        'AU'=>$newDate2,
       
    ])->setPaper('a4', 'landscape');;
    return $pdf->stream('relevé_deduction.pdf');
   
}
public function Storesjson(Request $request)
{
   
    try {
    
        if(!empty($request->Mode_p)||!empty($request->Date_fact)||!empty($request->Date_payement)||!empty($request->ID_FIscal)||!empty($request->ICE)||!empty($request->FRS)||!empty($request->TTC)||!empty($request->TVA)||!empty($request->taux)||!empty($request->Mht)||!empty($request->des)||!empty($request->Nfact)||!empty($request->Racine)){
        // $achat->TVA_deductible = $request->TVA_deductible;
        // $achat->Prorata = $request->prorata;
        // $achat->FK_type_payment = $request->Mode_p;
        // $achat->Date_facture = $request->Date_fact;
        // $achat->Date_payment = $request->Date_payement;
        // $achat->FK_fournisseur = $request->ID_FIscal;
        // $achat->FK_fournisseur = $request->ICE;
        // $achat->FK_fournisseur = $request->FRS;
        // $achat->M_TTC = $request->TTC;
        // $achat->TVA_7 = $request->TVA;
        // $achat->Taux7 = $request->taux;
        // $achat->M_HT_7 = $request->Mht;
        // $achat->Designation = $request->des;
        // $achat->N_facture = $request->Nfact;
        $frs=fournisseurs::select('fournisseurs.*')
        ->where('fournisseurs.deleted_at', '=', NULL)
        ->where('fournisseurs.nomFournisseurs',$request->FRS)->first();
        $achat = new achat();
        if(!$frs)
        {
            $fournisseurs = new fournisseurs();
            $fournisseurs->ID_fiscale=$request->ID_FIscal;
            $fournisseurs->NICE=$request->ICE;
            $fournisseurs->Designation=$request->des;
            $fournisseurs->nomFournisseurs=$request->FRS;
            $fournisseurs->Num_compte_comptable=$request->compte;
            $fournisseurs->save();
            $achat->FK_fournisseur=$fournisseurs->id;
           
        }else
        {
            $frs->Designation=$request->des;
            $frs->Num_compte_comptable=$request->compte;
            $achat->FK_fournisseur=$frs->id;
        } 

        $payments=type_payment::select('type_payments.*')
        ->where('type_payments.deleted_at', '=', NULL)
        ->where('type_payments.Num_payment',$request->Mode_p)->first();
        $achat->FK_type_payment=$payments->id;

 //         $order=achat::select('achats.order')
        //         ->where('achats.deleted_at', '=', NULL)
        //         ->where('achats.Exercice',$request->Exercice)
       //         ->where('achats.FK_regime',$request->periode) ->latest()->First(); 
      
        // if($order)
         // {
        //     $ord=$order->order+1;
   
        // }else
        // {
        //     $ord=1;
        // }


        $nfac= $request->Nfact;
       $lastCH=substr($nfac, -1);
       $lastCH2=substr($nfac, -2);
       if($lastCH==='7' && $request->des === 'ELECTRICITE')
       {
        $nfac = substr($nfac, 0, -1);
       }
       if($lastCH2==='14' || $lastCH2==='10'|| $lastCH2==='20' && $request->des === 'ELECTRICITE')
       {
        $nfac = substr($nfac, 0, -2);
       }
        $get_achat = achat::where('achats.N_facture',$nfac)
        ->where('achats.deleted_at', '=', NULL)->First();
       
     if($get_achat)
     {   $get_achat->M_TTC=$get_achat->M_TTC+$request->TTC;
        if($request->taux==7)
        {
            $get_achat->Taux7=$request->taux;
            $get_achat->TVA_7=$request->TVA;
            $get_achat->M_HT_7=$request->Mht;
            $get_achat->TTC_7=$request->TTC;
            $get_achat->TVA_d7=$request->TVA;;
            if($request->Racine!='null'){
                $get_achat->num_racine_7=$request->Racine;
            }  
            $num = racine::select('racines.id')
            ->where('racines.Num_racines',$request->Racine)
            ->where('racines.deleted_at', '=', NULL)->first();
            $get_achat->FK_racines_7=$num->id;
        }
        if($request->taux==10)
        {
         $get_achat->Taux10=$request->taux;
         $get_achat->TVA_10=$request->TVA;
         $get_achat->M_HT_10=$request->Mht;
         $get_achat->TTC_10=$request->TTC;
         $get_achat->TVA_d10=$request->TVA;;
        
         if($request->Racine!='null'){
            $get_achat->num_racine_10=$request->Racine;
         }
         $num = racine::select('racines.id')
         ->where('racines.Num_racines',$request->Racine)
         ->where('racines.deleted_at', '=', NULL)->first();
         $get_achat->FK_racines_10=$num->id;
        }  
             
        if($request->taux==14)
        {
         $get_achat->Taux14=$request->taux;
         $get_achat->TVA_14=$request->TVA;
         $get_achat->M_HT_14=$request->Mht;
         $get_achat->TTC_14=$request->TTC;
         $get_achat->TVA_d14=$request->TVA;;
        
         if($request->Racine!='null'){
            $get_achat->num_racine_14=$request->Racine;
         }
         $num = racine::select('racines.id')
         ->where('racines.Num_racines',$request->Racine)
         ->where('racines.deleted_at', '=', NULL)->first();
         $get_achat->FK_racines_14=$num->id;
    
         
        }  
        if($request->taux==20)
        {
         $get_achat->Taux20=$request->taux;
         $get_achat->TVA_20=$request->TVA;
         $get_achat->M_HT_20=$request->Mht;
         $get_achat->TTC_20=$request->TTC;
         $get_achat->TVA_d20=$request->TVA;;
        
         if($request->Racine!='null'){
            $get_achat->num_racine_20=$request->Racine;
         }
         $num = racine::select('racines.id')
         ->where('racines.Num_racines',$request->Racine)
         ->where('racines.deleted_at', '=', NULL)->first();
         $get_achat->FK_racines_20=$num->id;     
        }  
        $get_achat->save();
     }else{
        
        $achat->N_facture=$nfac;
        $achat->Date_facture=$request->Date_fact;
        $achat->Date_payment=$request->Date_payement;
        $achat->Designation=$request->des;
        $achat->M_TTC=$request->TTC;
        $achat->Prorata=100;      
        $achat->Exercice=$request->Exercice;   
        $achat->FK_regime=$request->periode;     
        $achat->order=$request->order;  
        if($request->taux==7)
        {
            $achat->Taux7=$request->taux;
            $achat->TVA_7=$request->TVA;
            $achat->M_HT_7=$request->Mht;
            $achat->TTC_7=$request->TTC;
            $achat->TVA_d7=$request->TVA;;
            if($request->Racine!='null'){
                $achat->num_racine_7=$request->Racine;
            }  
            $num = racine::select('racines.id')
            ->where('racines.Num_racines',$request->Racine)
            ->where('racines.deleted_at', '=', NULL)->first();
            $achat->FK_racines_7=$num->id;
        }
        if($request->taux==10)
        {
         $achat->Taux10=$request->taux;
         $achat->TVA_10=$request->TVA;
         $achat->M_HT_10=$request->Mht;
         $achat->TTC_10=$request->TTC;
         $achat->TVA_d10=$request->TVA;;
        
         if($request->Racine!='null'){
            $achat->num_racine_10=$request->Racine;
         }
         $num = racine::select('racines.id')
         ->where('racines.Num_racines',$request->Racine)
         ->where('racines.deleted_at', '=', NULL)->first();
         $achat->FK_racines_10=$num->id;
    
         
         if($request->taux==14)
         {
          $achat->Taux14=$request->taux;
          $achat->TVA_14=$request->TVA;
          $achat->M_HT_14=$request->Mht;
          $achat->TTC_14=$request->TTC;
          $achat->TVA_d14=$request->TVA;;
         
          if($request->Racine!='null'){
             $achat->num_racine_14=$request->Racine;
          }
          $num = racine::select('racines.id')
          ->where('racines.Num_racines',$request->Racine)
          ->where('racines.deleted_at', '=', NULL)->first();
          $achat->FK_racines_14=$num->id;
     
          
         }  
        }  
        if($request->taux==20)
        {
         $achat->Taux20=$request->taux;
         $achat->TVA_20=$request->TVA;
         $achat->M_HT_20=$request->Mht;
         $achat->TTC_20=$request->TTC;
         $achat->TVA_d20=$request->TVA;;
        
         if($request->Racine!='null'){
            $achat->num_racine_20=$request->Racine;
         }
         $num = racine::select('racines.id')
         ->where('racines.Num_racines',$request->Racine)
         ->where('racines.deleted_at', '=', NULL)->first();
         $achat->FK_racines_20=$num->id;
    
         
        }  

        $achat->save();
     }
         
      
        
        return response()->json([
            'status' => 200,
            'message' => 'Ajouter avec succès',
        ]);
        }

       
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

    // public function exportToExcel(Request $request)
    // {
       
    //         // Récupérez les données de l'input de type texte A-Z
    //         $data = $request->input('inputText');
    //         // $Date_payement = $request->input('Date_payement');
    //         // $TVA_deductible = $request->input('TVA_deductible');
    //         // $Prorata = $request->input('Prorata');
    //         // $mode_p = $request->input('mode_p');
    //         // $Racine = $request->input('Racine');
    //         // $Date_facture = $request->input('Date_facture');
    //         // $ID_fiscale = $request->input('ID_fiscale');
    //         // $ICE = $request->input('ICE');
    //         // $FRS = $request->input('FRS');
    //         // $TTC = $request->input('TTC');
    //         // $TVA = $request->input('TVA');
    //         // $Taux = $request->input('Taux');
    //         // $MHT = $request->input('MHT');
    //         // $NFACT = $request->input('NFACT');

    //         // Créez un nouvel objet Spreadsheet (classe de PhpSpreadsheet)
    //         $spreadsheet = new Spreadsheet();

    //         // Sélectionnez la première feuille de calcul (par défaut)
    //         $sheet = $spreadsheet->getActiveSheet();

    //         // Placez les données dans la cellule A1 du fichier Excel
    //         $sheet->setCellValue('B1', $data);

    //         // Créez un objet Writer pour sauvegarder le fichier Excel
    //         $writer = new Xlsx($spreadsheet);

    //         // Spécifiez le chemin où vous souhaitez enregistrer le fichier Excel
    //         $excelFilePath = public_path('votre_fichier.xlsx');

    //         // Enregistrez le fichier Excel
    //         $writer->save($excelFilePath);

    //         // Retournez le chemin du fichier Excel généré (vous pouvez rediriger l'utilisateur vers ce fichier)
    //         return response()->download($excelFilePath)->deleteFileAfterSend(true);

    // }
    function viderTable(Request $request){
        try {
   
            $check = achat::where('Exercice', $request->delete_exercice)
            ->where('FK_regime', $request->delete_periode)->get();
       
            if ($check->count() > 0) {
                // If there are matching records, delete them
                $check->each(function ($record) {
                    $record->delete();
                });
            
                return response()->json([
                    'status' => 200,
                    'message' => 'Suppression avec succès',
                ]);
            } else {
                return response()->json([
                    'status' => 200,
                    'danger' => 'Aucun enregistrement trouvé pour la suppression',
                ]);
            }
        } catch (\Exception $e) {
    
            return redirect()
                ->back()
                ->with('danger', 'Merci de vérifier la connexion internet, si non Contacter le service IT')
                ->withInput();
        }
    }

}

