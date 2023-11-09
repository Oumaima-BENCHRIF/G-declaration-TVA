<?php


namespace App\Http\Controllers;
use App\Models\agence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard1');
    }
    public function info_societe()
    {
        $id=1; dd($id);
    $get_info = agence::select('agences.*','regimes.libelle as libelle')
    ->join('regimes', 'regimes.id', 'agences.FK_Regime')
    ->where('agences.id',$id)->first();
    
    return response()->json([
        'get_info' => $get_info
    ]);

    }
}
