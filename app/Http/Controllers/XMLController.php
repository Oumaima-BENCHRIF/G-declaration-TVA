<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\achat;
// use Illuminate\Support\Facades\Response;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class XMLController extends Controller
{
    //
    function xml(Request $request)
    {
        // $data = achat::select('achats.*', 'fournisseurs.NICE', 'fournisseurs.ID_fiscale', 'fournisseurs.nomFournisseurs', 'type_payments.Nom_payment', 'racines.Num_racines', 'racines.Taux', 'regimes.periode as periode')
        //     ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        //     ->join('regimes', 'regimes.id', 'achats.FK_racines_7')
        //     ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
        //     ->join('fait_generateurs', 'fait_generateurs.id', 'achats.FK_fait_generateur')
        //     ->join('racines', 'racines.id', 'achats.num_racine_7')
        //     ->where('achats.FK_regime', $request->periode)
        //     ->where('achats.Exercice', $request->Exercice)
        //     ->where('achats.deleted_at', '=', NULL)->get();

        $data = achat::select('achats.*','fournisseurs.NICE as NICE','fournisseurs.ID_fiscale as ID_fiscale','fournisseurs.nomFournisseurs as nomFournisseurs','type_payments.Nom_payment as Nom_payment')
        ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
        ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
        ->where('achats.FK_regime', $request->periode)
        ->where('achats.Exercice', $request->Exercice)
        ->where('achats.deleted_at', '=', NULL)
        ->get();
   $cpt=0;
        // Créez une nouvelle instance de SimpleXMLElement pour créer un document XML.
        $xml = new \SimpleXMLElement('<?xml version="1.0"?><DeclarationReleveDeduction></DeclarationReleveDeduction>'); // Parcourez les données et ajoutez-les au document XML.
        // Ajoutez les données à la structure XML manuellement.
        if($data->isNotEmpty()){
            $cpt= $cpt+1;
            foreach ($data as $row) {

                if (!empty($row->M_HT_7) && !empty($row->TVA_7)) {
                    $xml->addChild('identifiantFiscal', $row->ID_Fiscale);
                    $xml->addChild('annee', $row->Exercice);
                    $xml->addChild('periode', "1");
                    $xml->addChild('regime', $row->periode);
                    $releveDeductions = $xml->addChild('releveDeductions');
                    $rd = $releveDeductions->addChild('rd');
                    $rd->addChild('ord', $cpt);
                    $rd->addChild('num', $row->N_facture);
                    $rd->addChild('des', $row->Designation);
                    $rd->addChild('mht', $row->M_HT_7);
                    $rd->addChild('tva', $row->TVA_d7);
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
                    $cpt= $cpt+1;
                }
                if (!empty($row->M_HT_10) && !empty($row->TVA_10)) {
                    $xml->addChild('identifiantFiscal', $row->ID_Fiscale);
                    $xml->addChild('annee', $row->Exercice);
                    $xml->addChild('periode', "1");
                    $xml->addChild('regime', $row->periode);
                    $releveDeductions = $xml->addChild('releveDeductions');
                    $rd = $releveDeductions->addChild('rd');
                    $rd->addChild('ord',  $cpt);
                    $rd->addChild('num', $row->N_facture);
                    $rd->addChild('des', $row->Designation);
                    $rd->addChild('mht', $row->M_HT_10);
                    $rd->addChild('tva', $row->TVA_d10);
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
                    $cpt= $cpt+1;
                }
                if (!empty($row->M_HT_14) && !empty($row->TVA_14)) {
                    $xml->addChild('identifiantFiscal', $row->ID_Fiscale);
                    $xml->addChild('annee', $row->Exercice);
                    $xml->addChild('periode', "1");
                    $xml->addChild('regime', $row->periode);
                    $releveDeductions = $xml->addChild('releveDeductions');
                    $rd = $releveDeductions->addChild('rd');
                    $rd->addChild('ord',  $cpt);
                    $rd->addChild('num', $row->N_facture);
                    $rd->addChild('des', $row->Designation);
                    $rd->addChild('mht', $row->M_HT_14);
                    $rd->addChild('tva', $row->TVA_d14);
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
                    $cpt= $cpt+1;
                }
                if (!empty($row->M_HT_20) && !empty($row->TVA_20)) {
                    $xml->addChild('identifiantFiscal', $row->ID_Fiscale);
                    $xml->addChild('annee', $row->Exercice);
                    $xml->addChild('periode', "1");
                    $xml->addChild('regime', $row->periode);
                    $releveDeductions = $xml->addChild('releveDeductions');
                    $rd = $releveDeductions->addChild('rd');
                    $rd->addChild('ord',  $cpt);
                    $rd->addChild('num', $row->N_facture);
                    $rd->addChild('des', $row->Designation);
                    $rd->addChild('mht', $row->M_HT_20);
                    $rd->addChild('tva', $row->TVA_d20);
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
                    $cpt= $cpt+1;
                }
    
            }
            // ***************************************
            //     // Entête de réponse pour indiquer que nous renvoyons du XML.
            //     $response = new Response($xml->asXML(), 200);
            // $response->header('Content-Type', 'application/xml');
            // $filename = 'exported_data.xml';
            // $response->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    
            //     return $response;
            //     // return response()->json([
            //     //     "code" => 200,
            //     //     'responsexml' => $response
            //     // ]);
            // ***************************************
            // Créez un fichier XML temporaire.
            $xmlFileName = 'exported_data.xml';
            file_put_contents($xmlFileName, $xml->asXML());
    
            // Créez un fichier ZIP.
            $zip = new \ZipArchive();
            $zipFileName = 'exported_data.zip';
    
            if ($zip->open($zipFileName, \ZipArchive::CREATE) === true) {
                // Ajoutez le fichier XML au fichier ZIP.
                $zip->addFile($xmlFileName, 'exported_data.xml');
                $zip->close();
            }
    
            // Supprimez le fichier XML temporaire.
            unlink($xmlFileName);
    
            // Entête de réponse pour indiquer que nous renvoyons du ZIP.
            $response = Response::make(file_get_contents($zipFileName), 200);
            $response->header('Content-Type', 'application/zip');
    
            // Nom du fichier ZIP de sortie.
            $response->header('Content-Disposition', 'attachment; filename="' . $zipFileName . '"');
    
            // Supprimez le fichier ZIP temporaire après l'envoi.
            unlink($zipFileName);
    
            return $response;
    
        }else{
            $message = "Hello, World!";
            $script = "alert('" . addslashes($message) . "');";
            return response($script)->header('Content-Type', 'application/javascript');
         }
        

    }
}