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
class VenteController extends Controller
{
    public function index()
    {
        return view('apps.Vente');
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
}
