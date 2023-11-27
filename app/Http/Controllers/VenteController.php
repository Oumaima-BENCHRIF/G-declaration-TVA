<?php

namespace App\Http\Controllers;

use App\Models\vente;
use App\Models\agence;
use App\Models\client;
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
class VenteController extends Controller
{
    public function index()
    {
        return view('apps.Vente');
    }
    public function Stores(Request $request)
        { 
            try {
                    $client=client::select('client.*')
                    ->where('client.deleted_at', '=', NULL)
                    ->where('client.id',$request->input('client'))->first();
                 
                    // if(!$client)
                    // {
                    //     $clt = new client();
                    //     $clt->ID_fiscale=$request->input('id_fiscal');
                    //     $clt->NICE=$request->input('N_ICE');
                    //     $clt->Designation=$request->input('desc');
                    //     $clt->nomFournisseurs=$request->input('frs');
                    //     $clt->Num_compte_comptable=$request->input('n_compt');
                    //     $clt->save();
                        //  
                       
                    // }else
                    // {
                    //     $client->Num_compte_comptable=$request->input('n_compt');
                    //     $client->Designation=$request->input('desc');
                    //     $client->FK_fournisseur=$client->id;
                    //     $client->save();
        
                    // }   
            $vente = new vente();
            $vente->N_facture=$request->input('n_fact');
            $vente->Date_facture=$request->input('date_fact');
            $vente->Date_payment=$request->input('date_p');
            $vente->Designation=$request->input('desc');
            $vente->M_TTC=$request->input('MTttc');
            $vente->Exercice=$request->input('Exercice');   
            $vente->FK_regime=$request->input('periode');     
            $vente->FK_type_payment=$request->input('Mpayement');
            $vente->FK_Client=$request->input('Client');
           
            if($request->input('taux1')==7)
            {
                $vente->Taux7=$request->input('taux1');
                $vente->TVA_7=$request->input('tva_1');
                $vente->M_HT_7=$request->input('MHT_1');
                $vente->TTC_7=$request->input('ttc1');
                if($request->input('racine')!='null'){
                    $vente->FK_racines_7=$request->input('racine');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $vente->num_racine_7=$num->Num_racines;
            }
            if($request->input('taux2')==7)
            {
                $vente->Taux7=$request->input('taux2');
                $vente->TVA_7=$request->input('tva_2');
                $vente->M_HT_7=$request->input('MHT_2');
                $vente->TTC_7=$request->input('ttc2');
                if($request->input('racine2')!='null'){
                    $vente->FK_racines_7=$request->input('racine2');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine2'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $vente->num_racine_7=$num->Num_racines;

            }
            if($request->input('taux3')==7)
            {
                $vente->Taux7=$request->input('taux3');
                $vente->TVA_7=$request->input('tva_3');
                $vente->M_HT_7=$request->input('MHT_3');
                $vente->TTC_7=$request->input('ttc3');
                if($request->input('racine3')!='null'){
                    $vente->FK_racines_7=$request->input('racine3');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine3'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $vente->num_racine_7=$num->Num_racines;
            }
            if($request->input('taux4')==7)
            {
                $vente->Taux7=$request->input('taux4');
                $vente->TVA_7=$request->input('tva_4');
                $vente->M_HT_7=$request->input('MHT_4');
                $vente->TTC_7=$request->input('ttc4');
                if($request->input('racine4')!='null'){
                    $vente->FK_racines_7=$request->input('racine4');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine4'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $vente->num_racine_7=$num->Num_racines;
            }
            if($request->input('taux1')==10)
            {
             $vente->Taux10=$request->input('taux1');
             $vente->TVA_10=$request->input('tva_1');
             $vente->M_HT_10=$request->input('MHT_1');
             $vente->TTC_10=$request->input('ttc1');
             if($request->input('racine')!='null'){
                $vente->FK_racines_10=$request->input('racine');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine'))
             ->where('racines.deleted_at', '=', NULL)->first();
          
             $vente->num_racine_10=$num->Num_racines;
            }
            if($request->input('taux2')==10)
            {
             $vente->Taux10=$request->input('taux2');
             $vente->TVA_10=$request->input('tva_2');
             $vente->M_HT_10=$request->input('MHT_2');
             $vente->TTC_10=$request->input('ttc2');
             if($request->input('racine2')!='null'){
                $vente->FK_racines_10=$request->input('racine2');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine2'))
             ->where('racines.deleted_at', '=', NULL)->first();
          
             $vente->num_racine_10=$num->Num_racines;
            }  
            if($request->input('taux3')==10)
            {
             $vente->Taux10=$request->input('taux3');
             $vente->TVA_10=$request->input('tva_3');
             $vente->M_HT_10=$request->input('MHT_3');
             $vente->TTC_10=$request->input('ttc3');
             if($request->input('racine3')!='null'){
                $vente->FK_racines_10=$request->input('racine3');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine3'))
             ->where('racines.deleted_at', '=', NULL)->first();
          
             $vente->num_racine_10=$num->Num_racines;
            }
            if($request->input('taux4')==10)
            {
             $vente->Taux10=$request->input('taux4');
             $vente->TVA_10=$request->input('tva_4');
             $vente->M_HT_10=$request->input('MHT_4');
             $vente->TTC_10=$request->input('ttc4');
             if($request->input('racine4')!='null'){
                $vente->FK_racines_10=$request->input('racine4');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine4'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_10=$num->Num_racines;
            }
            if($request->input('taux1')==14)
            {
             $vente->Taux14=$request->input('taux1');
             $vente->TVA_14=$request->input('tva_1');
             $vente->M_HT_14=$request->input('MHT_1');
             $vente->TTC_14=$request->input('ttc1');
             if($request->input('racine')!='null'){
                $vente->FK_racines_14=$request->input('racine');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_14=$num->Num_racines;
            }
            if($request->input('taux2')==14)
            {
             $vente->Taux14=$request->input('taux2');
             $vente->TVA_14=$request->input('tva_2');
             $vente->M_HT_14=$request->input('MHT_2');
             $vente->TTC_14=$request->input('ttc2');
             if($request->input('racine2')!='null'){
                $vente->FK_racines_14=$request->input('racine2');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine2'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_14=$num->Num_racines;
            }  
            if($request->input('taux3')==14)
            {
             $vente->Taux14=$request->input('taux3');
             $vente->TVA_14=$request->input('tva_3');
             $vente->M_HT_14=$request->input('MHT_3');
             $vente->TTC_14=$request->input('ttc3');
             if($request->input('racine3')!='null'){
                $vente->FK_racines_14=$request->input('racine3');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine3'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_14=$num->Num_racines;
            }
            if($request->input('taux4')==14)
            {
             $vente->Taux14=$request->input('taux4');
             $vente->TVA_14=$request->input('tva_4');
             $vente->M_HT_14=$request->input('MHT_4');
             $vente->TTC_14=$request->input('ttc4');
             if($request->input('racine4')!='null'){
                $vente->FK_racines_14=$request->input('racine4');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine4'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_14=$num->Num_racines;
            }
            if($request->input('taux1')==20)
            {
             $vente->Taux20=$request->input('taux1');
             $vente->TVA_20=$request->input('tva_1');
             $vente->M_HT_20=$request->input('MHT_1');
             $vente->TTC_20=$request->input('ttc1');
             if($request->input('racine')!='null'){
                $vente->FK_racines_20=$request->input('racine');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_20=$num->Num_racines;
            }
            if($request->input('taux2')==20)
            {
             $vente->Taux20=$request->input('taux2');
             $vente->TVA_20=$request->input('tva_2');
             $vente->M_HT_20=$request->input('MHT_2');
             $vente->TTC_20=$request->input('ttc2');
             if($request->input('racine2')!='null'){
                $vente->FK_racines_20=$request->input('racine2');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine2'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_20=$num->Num_racines;
            }  
            if($request->input('taux3')==20)    
            {
             $vente->Taux20=$request->input('taux3');
             $vente->TVA_20=$request->input('tva_3');
             $vente->M_HT_20=$request->input('MHT_3');
             $vente->TTC_20=$request->input('ttc3');
             if($request->input('racine3')!='null'){
                $vente->FK_racines_20=$request->input('racine3');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine3'))
             ->where('racines.deleted_at', '=', NULL)->first();
          
             $vente->num_racine_20=$num->Num_racines;
            }   
         
            if($request->input('taux4')==20)
            {
             $vente->Taux20=$request->input('taux4');
             $vente->TVA_20=$request->input('tva_4');
             $vente->M_HT_20=$request->input('MHT_4');
             $vente->TTC_20=$request->input('ttc4');
             if($request->input('racine4')!='null'){
                $vente->FK_racines_20=$request->input('racine4');
             }
             $num = racine::select('racines.Num_racines')
             ->where('racines.id',$request->input('racine4'))
             ->where('racines.deleted_at', '=', NULL)->first();
             $vente->num_racine_20=$num->Num_racines;
            }   
            // dd($vente);
            $vente->save();
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
    public function Liste_Mpyement(Request $request)
    {
        $Liste_payment = type_payment::where('type_payments.deleted_at', '=', NULL)->orderBy("Num_payment", "asc")->get();

        return response()->json([
            'Liste_payment' => $Liste_payment
        ]);
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
public function Liste_Racine(Request $request)
{
    
    $Liste_Racine = racine::where('racines.type', 'vente')
    ->where('racines.deleted_at', '=', NULL)
    ->orderBy("Num_racines", "asc")->get();

    return response()->json([
        'Liste_Racine' => $Liste_Racine
    ]);
}
public function Liste_Client(Request $requesregiminfot)
{
    $Liste_client = client::where('client.deleted_at', '=', NULL)->orderBy("id", "desc")->get();

    return response()->json([
        'Liste_client' => $Liste_client
    ]);
}
    public function get_TBLvente($periode,$Exercice) 
    { 
       
        // $get_TBLachat =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.nomFournisseurs','type_payments.Nom_payment')
        // ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        // ->join('regimes', 'regimes.id', 'achats.FK_regime')
        // ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment') 
      
        // ->where('achats.FK_regime',$periode)
        // ->where('achats.Exercice',$Exercice)
        // ->where('achats.deleted_at', '=', NULL)->get();
        $get_TBLvebtet =vente::select('vente.*','client.nom as nom','type_payments.Nom_payment as Nom_payment')
        ->join('client', 'client.id', 'vente.FK_Client')
        ->join('type_payments', 'type_payments.id', 'vente.FK_type_payment')
        ->where('vente.FK_regime',$periode)
        ->where('vente.Exercice',$Exercice)
        ->where('vente.deleted_at', '=', NULL)
        ->get();
  

        $table_vente3=[];
        $totalHT=0;
        $totalTTC=0;
        $totalTVA=0;
       $ord=1;
       foreach ($get_TBLvebtet as $key => $vtn) {
    
        if($vtn->Taux7!=null)
        {
            $Vente=new Vente();
            $Vente->order=$ord;
            $Vente->id=$vtn->id;
            $Vente->N_facture=$vtn->N_facture;
            $Vente->Date_facture=$vtn->Date_facture;
            $Vente->Date_payment=$vtn->Date_payment;
            $Vente->Designation=$vtn->Designation;
            $Vente->TVA_10=$vtn->nomFournisseurs;
            $Vente->TVA_14=$vtn->NICE;
            $Vente->TVA_20=$vtn->ID_fiscale;
            $Vente->M_HT_20=$vtn->Nom_payment;
            $Vente->M_TTC=$vtn->M_TTC;
            $Vente->Prorata=$vtn->Prorata;
            // $Vente->TVA_d7=$vtn->TVA_d7;  
            $Vente->Exercice=$vtn->Exercice;   
            $Vente->FK_regime=$vtn->FK_regime;     
            $Vente->FK_type_payment=$vtn->FK_type_payment;
            $Vente->Taux7=$vtn->Taux7;
            $Vente->TVA_7=$vtn->TVA_7;
          $totalTVA=$totalTVA+$vtn->TVA_7;
            $Vente->M_HT_7=$vtn->M_HT_7;
          $totalHT=$totalHT+$vtn->M_HT_7;
            $Vente->TTC_7=$vtn->TTC_7;
          $totalTTC=$totalTTC+$vtn->TTC_7;
            $Vente->FK_racines_7=$vtn->FK_racines_7;
            $Vente->num_racine_7=$vtn->num_racine_7;
            $Vente->FK_fournisseur=$vtn->FK_fournisseur;
           
            $table_vente3[]=$Vente;
            $ord=$ord+1;
        }
        if($vtn->Taux10!=null)
        {
            $Vente=new vente();
            $Vente->order=$ord;
            $Vente->id=$vtn->id;
            $Vente->N_facture=$vtn->N_facture;
            $Vente->Date_facture=$vtn->Date_facture;
            $Vente->Date_payment=$vtn->Date_payment;
            $Vente->Designation=$vtn->Designation;
            $Vente->TVA_10=$vtn->nomFournisseurs;
            $Vente->TVA_14=$vtn->NICE;
            $Vente->TVA_20=$vtn->ID_fiscale;
            $Vente->M_HT_20=$vtn->Nom_payment;
            $Vente->M_TTC=$vtn->M_TTC;
            $Vente->Prorata=$vtn->Prorata;
            // $Vente->TVA_d7=$vtn->TVA_d10;
            $Vente->Exercice=$vtn->Exercice;   
            $Vente->FK_regime=$vtn->FK_regime;     
            $Vente->FK_type_payment=$vtn->FK_type_payment;
            $Vente->Taux7=$vtn->Taux10;
            $Vente->TVA_7=$vtn->TVA_10;
          $totalTVA=$totalTVA+$vtn->TVA_10;
            $Vente->M_HT_7=$vtn->M_HT_10;
          $totalHT=$totalHT+$vtn->M_HT_10;
            $Vente->TTC_7=$vtn->TTC_10;
          $totalTTC=$totalTTC+$vtn->TTC_10;
            $Vente->FK_racines_7=$vtn->FK_racines_10;
            $Vente->num_racine_7=$vtn->num_racine_10;
            $Vente->FK_fournisseur=$vtn->FK_fournisseur;
           
            $table_vente3[]=$Vente;
            $ord=$ord+1;
        }
        if($vtn->Taux14!=null)
        {
            $Vente=new vente();
            $Vente->order=$ord;
            $Vente->id=$vtn->id;
            $Vente->N_facture=$vtn->N_facture;
            $Vente->Date_facture=$vtn->Date_facture;
            $Vente->Date_payment=$vtn->Date_payment;
            $Vente->Designation=$vtn->Designation;
            $Vente->TVA_10=$vtn->nomFournisseurs;
            $Vente->TVA_14=$vtn->NICE;
            $Vente->TVA_20=$vtn->ID_fiscale;
            $Vente->M_HT_20=$vtn->Nom_payment;
            $Vente->M_TTC=$vtn->M_TTC;
            $Vente->Prorata=$vtn->Prorata;
            // $Vente->TVA_d7=$vtn->TVA_d14;
            $Vente->Exercice=$vtn->Exercice;   
            $Vente->FK_regime=$vtn->FK_regime;     
            $Vente->FK_type_payment=$vtn->FK_type_payment;
            $Vente->Taux7=$vtn->Taux14;
            $Vente->TVA_7=$vtn->TVA_14;
          $totalTVA=$totalTVA+$vtn->TVA_14;
            $Vente->M_HT_7=$vtn->M_HT_14;
          $totalHT=$totalHT+$vtn->M_HT_14;
            $Vente->TTC_7=$Vente->TTC_14;
          $totalTTC=$totalTTC+$vtn->TTC_14;
            $Vente->FK_racines_7=$vtn->FK_racines_14;
            $Vente->num_racine_7=$vtn->num_racine_14;
            $Vente->FK_fournisseur=$vtn->FK_fournisseur;
            $table_vente3[]=$Vente;
            $ord=$ord+1;
        }
        if($vtn->Taux20!=null)
        {
            $Vente=new vente();
            $Vente->order=$ord;
            $Vente->id=$vtn->id;
            $Vente->N_facture=$vtn->N_facture;
            $Vente->Date_facture=$vtn->Date_facture;
            $Vente->Date_payment=$vtn->Date_payment;
            $Vente->Designation=$vtn->Designation;
            $Vente->TVA_10=$vtn->nomFournisseurs;
            $Vente->TVA_14=$vtn->NICE;
            $Vente->TVA_20=$vtn->ID_fiscale;
            $Vente->M_HT_20=$vtn->Nom_payment;
            $Vente->M_TTC=$vtn->M_TTC;
            $Vente->Prorata=$vtn->Prorata;
            // $Vente->TVA_d7=$vtn->TVA_d20;           
            $Vente->Exercice=$vtn->Exercice;   
            $Vente->FK_regime=$vtn->FK_regime;     
            $Vente->FK_type_payment=$vtn->FK_type_payment;
            $Vente->Taux7=$vtn->Taux20;
            $Vente->TVA_7=$vtn->TVA_20;
          $totalTVA=$totalTVA+$vtn->TVA_20;
            $Vente->M_HT_7=$vtn->M_HT_20;
          $totalHT=$totalHT+$vtn->M_HT_20;
            $Vente->TTC_7=$vtn->TTC_20;
          $totalTTC=$totalTTC+$vtn->TTC_20;
            $Vente->FK_racines_7=$vtn->FK_racines_20;
            $Vente->num_racine_7=$vtn->num_racine_20;
            $Vente->FK_fournisseur=$vtn->FK_fournisseur;
           
            $table_vente3[]=$Vente;
            $ord=$ord+1;
        }
     }
    
        $table_vente3 = collect($table_vente3)->sortBy('num_racine_7')->values()->all();
        $totalHT=number_format($totalHT, 2);
        $totalTTC=number_format($totalTTC, 2);
        $totalTVA=number_format($totalTVA, 2);

        return response()->json([
            'table_vente' => $table_vente3,
            'totalHT' => $totalHT,
            'totalTTC' => $totalTTC,
            'totalTVA' => $totalTVA,
        ]);
    }
    public function get_ventebyID($id)
    {
       
        $get_vent =vente::select('vente.*','client.id as idC','type_payments.Nom_payment','type_payments.id as idp')
        ->join('client', 'client.id', 'vente.FK_Client')
        ->join('type_payments', 'type_payments.id', 'vente.FK_type_payment')
        ->where('vente.id',$id)
        ->where('vente.deleted_at', '=', NULL)->first();
  
        return response()->json([
            'get_vent' => $get_vent
        ]);
      
    }
    public function Update(Request $request)
    {
        try {
            $vente = vente::where('vente.id',$request->input('id'))
            ->where('vente.deleted_at', '=', NULL)->first(); 

            // $frs=fournisseurs::select('fournisseurs.*')
            // ->where('fournisseurs.deleted_at', '=', NULL)
            // ->where('fournisseurs.id',$request->input('frs'))->first();
            // if(!$frs)
            // {
            //     $fournisseurs = new fournisseurs();
            //     $fournisseurs->ID_fiscale=$request->input('id_fiscal');
            //     $fournisseurs->NICE=$request->input('N_ICE');
            //     $fournisseurs->Designation=$request->input('desc');
            //     $fournisseurs->nomFournisseurs=$request->input('frs');
            //     $fournisseurs->Num_compte_comptable=$request->input('n_compt');
            //     $fournisseurs->save();
            //     $achat->FK_fournisseur=$fournisseurs->id;
               
            // }else
            // {
            //     $frs->Num_compte_comptable=$request->input('n_compt');
            //     $frs->Designation=$request->input('desc');
          
            //     $frs->save();

            // }   


            $vente->N_facture=$request->input('n_fact');
            $vente->Date_facture=$request->input('date_fact');
            $vente->Date_payment=$request->input('date_p');
            $vente->Designation=$request->input('desc');
            $vente->M_TTC=$request->input('MTttc');
            $vente->Exercice=$request->input('Exercice');   
            $vente->FK_regime=$request->input('periode');     
            $vente->FK_type_payment=$request->input('Mpayement');
            if($request->input('Taux1')==7)
            {
                $vente->Taux7=$request->input('Taux1');
                $vente->TVA_7=$request->input('tva_1');
                $vente->M_HT_7=$request->input('MHT_1');
                $vente->TTC_7=$request->input('ttc1');
                if($request->input('racine')!='null'){
                    $vente->FK_racines_7=$request->input('racine');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $vente->num_racine_7=$num->Num_racines;
            }else
            {
                $vente->Taux7=null;
                $vente->TVA_7=null;
                $vente->M_HT_7=null;
                $vente->TTC_7=null;
                $vente->FK_racines_7=null;
                $vente->num_racine_7=null;
            }
            if($request->input('Taux2')==7)
            {
                $vente->Taux7=$request->input('Taux2');
                $vente->TVA_7=$request->input('tva_2');
                $vente->M_HT_7=$request->input('MHT_2');
                $vente->TTC_7=$request->input('ttc2');
                if($request->input('racine2')!='null'){
                    $vente->FK_racines_7=$request->input('racine2');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine2'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $vente->num_racine_7=$num->Num_racines;

            }
            if($request->input('Taux3')==7)
            {
                $vente->Taux7=$request->input('Taux3');
                $vente->TVA_7=$request->input('tva_3');
                $vente->M_HT_7=$request->input('MHT_3');
                $vente->TTC_7=$request->input('ttc3');            
                if($request->input('racine3')!='null'){
                    $vente->FK_racines_7=$request->input('racine3');
                }
                $num = racine::select('racines.Num_racines')
                ->where('racines.id',$request->input('racine3'))
                ->where('racines.deleted_at', '=', NULL)->first();
              
                $vente->num_racine_7=$num->Num_racines;
            }
            if($request->input('Taux1')==10)
            {
             $vente->Taux10=$request->input('Taux1');
            $vente->TVA_10=$request->input('tva_1');
            $vente->M_HT_10=$request->input('MHT_1');
            $vente->TTC_10=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $vente->FK_racines_10=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_10=$num->Num_racines;
            }else
            {
                $vente->Taux10=null;
                $vente->TVA_10=null;
                $vente->M_HT_10=null;
                $vente->TTC_10=null;
                $vente->FK_racines_10=null;
                $vente->num_racine_10=null;
            }
            if($request->input('Taux2')==10)
            {
            $vente->Taux10=$request->input('Taux2');
            $vente->TVA_10=$request->input('tva_2');
            $vente->M_HT_10=$request->input('MHT_2');
            $vente->TTC_10=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $vente->FK_racines_10=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_10=$num->Num_racines;
            }  
            if($request->input('Taux3')==10)
            {
            $vente->Taux10=$request->input('Taux3');
            $vente->TVA_10=$request->input('tva_3');
            $vente->M_HT_10=$request->input('MHT_3');
            $vente->TTC_10=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $vente->FK_racines_10=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_10=$num->Num_racines;
            }

            if($request->input('Taux1')==14)
            {
            $vente->Taux14=$request->input('Taux1');
            $vente->TVA_14=$request->input('tva_1');
            $vente->M_HT_14=$request->input('MHT_1');
            $vente->TTC_14=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $vente->FK_racines_14=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_14=$num->Num_racines;
            }else
            {
                $vente->Taux14=null;
                $vente->TVA_14=null;
                $vente->M_HT_14=null;
                $vente->TTC_14=null;
                $vente->FK_racines_14=null;
                $vente->num_racine_14=null;
            }
            if($request->input('Taux2')==14)
            {
            $vente->Taux14=$request->input('Taux2');
            $vente->TVA_14=$request->input('tva_2');
            $vente->M_HT_14=$request->input('MHT_2');
            $vente->TTC_14=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $vente->FK_racines_14=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_14=$num->Num_racines;
            }  
            if($request->input('Taux3')==14)
            {
            $vente->Taux14=$request->input('Taux3');
            $vente->TVA_14=$request->input('tva_3');
            $vente->M_HT_14=$request->input('MHT_3');
            $vente->TTC_14=$request->input('ttc3');

            if($request->input('racine3')!='null'){
                $vente->FK_racines_14=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_14=$num->Num_racines;
            }
            if($request->input('Taux1')==20)
            {
            $vente->Taux20=$request->input('Taux1');
            $vente->TVA_20=$request->input('tva_1');
            $vente->M_HT_20=$request->input('MHT_1');
            $vente->TTC_20=$request->input('ttc1');
            if($request->input('racine')!='null'){
                $vente->FK_racines_20=$request->input('racine');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_20=$num->Num_racines;
            }else
            {
                $vente->Taux20=null;
                $vente->TVA_20=null;
                $vente->M_HT_20=null;
                $vente->TTC_20=null;
                $vente->FK_racines_20=null;
                $vente->num_racine_20=null;
            }

            if($request->input('Taux2')==20)
            {
            $vente->Taux20=$request->input('Taux2');
            $vente->TVA_20=$request->input('tva_2');
            $vente->M_HT_20=$request->input('MHT_2');
            $vente->TTC_20=$request->input('ttc2');
            if($request->input('racine2')!='null'){
                $vente->FK_racines_20=$request->input('racine2');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine2'))
            ->where('racines.deleted_at', '=', NULL)->first();
            $vente->num_racine_20=$num->Num_racines;
            }  
            if($request->input('Taux3')==20)
            {
            $vente->Taux20=$request->input('Taux3');
            $vente->TVA_20=$request->input('tva_3');
            $vente->M_HT_20=$request->input('MHT_3');
            $vente->TTC_20=$request->input('ttc3');
            if($request->input('racine3')!='null'){
                $vente->FK_racines_20=$request->input('racine3');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine3'))
            ->where('racines.deleted_at', '=', NULL)->first();
          
            $vente->num_racine_20=$num->Num_racines;
            }
            if($request->input('Taux4')==20)
            {

          
            $vente->Taux20=$request->input('Taux4');
            $vente->TVA_20=$request->input('tva_4');
            $vente->M_HT_20=$request->input('MHT_4');
            $vente->TTC_20=$request->input('ttc4');
            if($request->input('racine4')!='null'){
                $vente->FK_racines_20=$request->input('racine4');
            }
            $num = racine::select('racines.Num_racines')
            ->where('racines.id',$request->input('racine4'))
            ->where('racines.deleted_at', '=', NULL)->first();
            $vente->num_racine_20=$num->Num_racines;
            }
            $vente->FK_Client=$request->input('Client');  
            // dd($vente);
            $vente->save();
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
    public function destroy(Request $request)
    {
        try {

            $check = vente::where('id', $request->delete_id_Vente)->first(); 
            if ($check != null) {
                $niveauurgence = vente::find($request->delete_id_Vente);
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
    function viderTableV(Request $request){
        try {
   
            $check = vente::where('Exercice', $request->delete_exercice)
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
