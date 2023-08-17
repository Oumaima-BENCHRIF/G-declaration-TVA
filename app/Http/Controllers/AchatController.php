<?php

namespace App\Http\Controllers;
use App\Models\fournisseurs;
use App\Models\type_payment;
use App\Models\racine;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    public function Liste_FRS(Request $request)
    {
        $Liste_FRS = fournisseurs::  where('fournisseurs.deleted_at', '=', NULL)->orderBy("id", "desc")->get();;

        return response()->json([
            'Liste_FRS' => $Liste_FRS
        ]);
    }
    public function Liste_Mpyement(Request $request)
    {
        $Liste_payment = type_payment::where('type_payments.deleted_at', '=', NULL)->orderBy("id", "desc")->get();;

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

}
