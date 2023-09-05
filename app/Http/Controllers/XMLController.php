<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\achat;
// use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response;
class XMLController extends Controller
{
    //
    function xml(Request $request)
    {

        $data =achat::select('achats.*','fournisseurs.NICE','fournisseurs.ID_fiscale','fournisseurs.nomFournisseurs','type_payments.Nom_payment','racines.Num_racines','racines.Taux','regimes.periode as periode')
        ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        ->join('regimes', 'regimes.id', 'achats.FK_racines_1')
        ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
        ->join('fait_generateurs', 'fait_generateurs.id', 'achats.FK_fait_generateur')
        ->join('racines', 'racines.id', 'achats.FK_racines_1')
        ->where('achats.FK_regime',$request->periode)
        ->where('achats.Exercice',$request->Exercice)
        ->where('achats.deleted_at', '=', NULL)->get();

        
        // Créez une nouvelle instance de SimpleXMLElement pour créer un document XML.
        $xml = new \SimpleXMLElement('<?xml version="1.0"?><DeclarationReleveDeduction></DeclarationReleveDeduction>');        // Parcourez les données et ajoutez-les au document XML.
       
         // Ajoutez les données à la structure XML manuellement.
         foreach ($data as $row) { 
            
            $xml->addChild('identifiantFiscal',$row->ID_Fiscale);

            $xml->addChild('annee',	$row->Exercice);

            $xml->addChild('periode',"1");

            $xml->addChild('regime', $row->periode);

            $releveDeductions = $xml->addChild('releveDeductions');
            $rd = $releveDeductions->addChild('rd');
            $rd->addChild('ord', $row->id);
            $rd->addChild('num', $row->N_facture);
            $rd->addChild('des', $row->Designation);
            $rd->addChild('mht1', $row->M_HT_1);
            $rd->addChild('mht2', $row->M_HT_2);
            $rd->addChild('mht3', $row->M_HT_3);
            $rd->addChild('tva1', $row->TVA_1);
            $rd->addChild('tva2', $row->TVA_2);
            $rd->addChild('tva3', $row->TVA_3);
            $rd->addChild('ttc', $row->M_TTC);

            $refF = $rd->addChild('refF');
            $refF->addChild('if', $row->ID_fiscale);
            $refF->addChild('nom', $row->nomFournisseurs);
            $refF->addChild('ice', $row->NICE);

            $rd->addChild('tx', $row->Taux);
            $rd->addChild('prorata', $row->Prorata);

            $mp = $rd->addChild('mp');
            $mp->addChild('id', $row->Num_payment);

            $rd->addChild('dpai', $row->Date_payment);
            $rd->addChild('dfac', $row->Date_facture);
        }

        // Entête de réponse pour indiquer que nous renvoyons du XML.
        $response = new Response($xml->asXML(), 200);
    $response->header('Content-Type', 'application/xml');
    $filename = 'exported_data.xml';
    $response->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        return $response;
        // return response()->json([
        //     "code" => 200,
        //     'responsexml' => $response
        // ]);
        
       
    }
}