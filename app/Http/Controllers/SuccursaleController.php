<?php

namespace App\Http\Controllers;
use App\Models\succursale;

use Illuminate\Http\Request;


class SuccursaleController extends Controller
{
   //Enregister Agents
   public function store(Request $request)
   {
       try {

           $Agents = new succursale();
           $Agents->nom_succorsale = $request->input('nom_succorsale');
           $Agents->ICE = $request->input('ICE');
           $Agents->Email = $request->input('Email');
           $Agents->Activite = $request->input('Activite');
           $Agents->ID_Fiscale = $request->input('ID_Fiscale');
           $Agents->Ville = $request->input('Ville');
           $Agents->Tele = $request->input('Tele');
           $Agents->Adresse = $request->input('Adresse');
           $Agents->Fax = $request->input('Fax');
           $Agents->FK_Regime = $request->input('FK_Regime');
           $Agents->FK_fait_generateurs = $request->input('FK_fait_generateurs');
           $Agents->save();

           return redirect()
               ->back()
               ->with('success', 'Votre demande a été bien envoyée.')
               ->withInput();
       } catch (\Exception $e) {

           return redirect()
               ->back()
               ->with('danger', 'Merci de vérifier la connexion internet, si non contacter le service IT')
               ->withInput();
       }
   }
}
