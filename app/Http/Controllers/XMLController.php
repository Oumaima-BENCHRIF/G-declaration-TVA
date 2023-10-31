<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\achat;
use App\Models\agence;
use App\Models\regime;
// use Illuminate\Support\Facades\Response;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use ZipArchive;

class XMLController extends Controller
{
    //
    function xml(Request $request)
    {
        try {
            // $data = achat::select('achats.*', 'fournisseurs.NICE', 'fournisseurs.ID_fiscale', 'fournisseurs.nomFournisseurs', 'type_payments.Nom_payment', 'racines.Num_racines', 'racines.Taux', 'regimes.periode as periode')
            //     ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
            //     ->join('regimes', 'regimes.id', 'achats.FK_racines_7')
            //     ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
            //     ->join('fait_generateurs', 'fait_generateurs.id', 'achats.FK_fait_generateur')
            //     ->join('racines', 'racines.id', 'achats.num_racine_7')
            //     ->where('achats.FK_regime', $request->periode)
            //     ->where('achats.Exercice', $request->Exercice)
            //     ->where('achats.deleted_at', '=', NULL)->get();
            $id = 1;
            $get_info = agence::select('agences.*', 'fait_generateurs.id as idf', 'fait_generateurs.libelle')
                ->join('fait_generateurs', 'fait_generateurs.id', 'agences.FK_fait_generateurs')
                ->where('agences.id', $id)
                ->first();

            $data = achat::select('achats.*', 'fournisseurs.NICE as NICE', 'fournisseurs.ID_fiscale as ID_fiscale', 'fournisseurs.nomFournisseurs as nomFournisseurs', 'type_payments.Num_payment as 	Num_payment', 'regimes.periode as prRegime', )
                ->join('fournisseurs', 'fournisseurs.id', 'achats.FK_fournisseur')
                ->join('type_payments', 'type_payments.id', 'achats.FK_type_payment')
                ->join('regimes', 'regimes.id', 'achats.FK_regime')
                ->where('achats.FK_regime', $request->periode)
                ->where('achats.Exercice', $request->Exercice)
                ->where('achats.deleted_at', '=', NULL)
                ->get();
            $cpt = 0;

            // Créez une nouvelle instance de SimpleXMLElement pour créer un document XML.
            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DeclarationReleveDeduction></DeclarationReleveDeduction>'); // Parcourez les données et ajoutez-les au document XML.
            // Ajoutez les données à la structure XML manuellement.
            if ($data->isNotEmpty()) {
                $cpt = $cpt + 1;
                $regime = regime::select('regimes.*')
                    ->where('regimes.deleted_at', '=', NULL)
                    ->where('regimes.id', '=', $data[0]->FK_regime)->first();
                $reg = 0;
                if ($regime->libelle == 'Mensuel') {
                    $reg = 1;
                } else {
                    if ($regime->libelle == 'trimestriel') {
                        $reg = 2;
                    }

                }
                $xml->addChild('identifiantFiscal', $get_info->ID_Fiscale);
                $xml->addChild('annee', $data[0]->Exercice);
                $xml->addChild('periode', $data[0]->prRegime);
                $xml->addChild('regime', $reg);
                $releveDeductions = $xml->addChild('releveDeductions');
                foreach ($data as $row) {



                    if (!empty($row->M_HT_7) && !empty($row->TVA_7)) {

                        // $releveDeductions = $xml->addChild('releveDeductions');
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
                        $rd->addChild('tx', number_format($row->Taux7, 2, '.', ''));
                        $rd->addChild('prorata', $row->Prorata);
                        $mp = $rd->addChild('mp');
                        $mp->addChild('id', $row->Num_payment);
                        $rd->addChild('dpai', $row->Date_payment);
                        $rd->addChild('dfac', $row->Date_facture);
                        $cpt = $cpt + 1;
                    }
                    if (!empty($row->M_HT_10) && !empty($row->TVA_10)) {


                        // $xml->addChild('identifiantFiscal', $get_info->ID_Fiscale);
                        // $xml->addChild('annee', $row->Exercice);
                        // $xml->addChild('periode', $row->prRegime);
                        // $xml->addChild('regime', $reg);
                        // $releveDeductions = $xml->addChild('releveDeductions');
                        $rd = $releveDeductions->addChild('rd');
                        $rd->addChild('ord', $cpt);
                        $rd->addChild('num', $row->N_facture);
                        $rd->addChild('des', $row->Designation);
                        $rd->addChild('mht', $row->M_HT_10);
                        $rd->addChild('tva', $row->TVA_d10);
                        $rd->addChild('ttc', $row->M_TTC);
                        $refF = $rd->addChild('refF');
                        $refF->addChild('if', $row->ID_fiscale);
                        $refF->addChild('nom', $row->nomFournisseurs);
                        $refF->addChild('ice', $row->NICE);
                        $rd->addChild('tx', number_format($row->Taux10, 2, '.', ''));
                        $rd->addChild('prorata', $row->Prorata);
                        $mp = $rd->addChild('mp');
                        $mp->addChild('id', $row->Num_payment);
                        $rd->addChild('dpai', $row->Date_payment);
                        $rd->addChild('dfac', $row->Date_facture);
                        $cpt = $cpt + 1;
                    }
                    if (!empty($row->M_HT_14) && !empty($row->TVA_14)) {

                        // $xml->addChild('identifiantFiscal', $get_info->ID_Fiscale);
                        // $xml->addChild('annee', $row->Exercice);
                        // $xml->addChild('periode', $row->prRegime);
                        // $xml->addChild('regime', $reg);
                        // $releveDeductions = $xml->addChild('releveDeductions');
                        $rd = $releveDeductions->addChild('rd');
                        $rd->addChild('ord', $cpt);
                        $rd->addChild('num', $row->N_facture);
                        $rd->addChild('des', $row->Designation);
                        $rd->addChild('mht', $row->M_HT_14);
                        $rd->addChild('tva', $row->TVA_d14);
                        $rd->addChild('ttc', $row->M_TTC);
                        $refF = $rd->addChild('refF');
                        $refF->addChild('if', $row->ID_fiscale);
                        $refF->addChild('nom', $row->nomFournisseurs);
                        $refF->addChild('ice', $row->NICE);
                        $rd->addChild('tx', number_format($row->Taux14, 2, '.', ''));
                        $rd->addChild('prorata', $row->Prorata);
                        $mp = $rd->addChild('mp');
                        $mp->addChild('id', $row->Num_payment);
                        $rd->addChild('dpai', $row->Date_payment);
                        $rd->addChild('dfac', $row->Date_facture);
                        $cpt = $cpt + 1;
                    }
                    if (!empty($row->M_HT_20) && !empty($row->TVA_20)) {
                        // 
                        // $xml->addChild('identifiantFiscal', $get_info->ID_Fiscale);
                        // $xml->addChild('annee', $row->Exercice);
                        // $xml->addChild('periode', $row->prRegime);
                        // $xml->addChild('regime', $reg);
                        // $releveDeductions = $xml->addChild('releveDeductions');
                        $rd = $releveDeductions->addChild('rd');
                        $rd->addChild('ord', $cpt);
                        $rd->addChild('num', $row->N_facture);
                        $rd->addChild('des', $row->Designation);
                        $rd->addChild('mht', $row->M_HT_20);
                        $rd->addChild('tva', $row->TVA_d20);
                        $rd->addChild('ttc', $row->M_TTC);
                        $refF = $rd->addChild('refF');
                        $refF->addChild('if', $row->ID_fiscale);
                        $refF->addChild('nom', $row->nomFournisseurs);
                        $refF->addChild('ice', $row->NICE);
                        $rd->addChild('tx', number_format($row->Taux20, 2, '.', ''));
                        $rd->addChild('prorata', $row->Prorata);
                        $mp = $rd->addChild('mp');
                        $mp->addChild('id', $row->Num_payment);
                        $rd->addChild('dpai', $row->Date_payment);
                        $rd->addChild('dfac', $row->Date_facture);
                        $cpt = $cpt + 1;
                    }

                }
                // ***************************************
                //     // Entête de réponse pour indiquer que nous renvoyons du XML.

                //     $response = new Response($xml->asXML(), 200);


                $responses = Response::make($xml->asXML(), 200);
                $responses->header('Content-Type', 'application/xml');
                $filenames = 'EDI_TVA_00' . $data[0]->prRegime . '_' . $request->Exercice . '_COMP.xml';

                $responses->header('Content-Disposition', 'attachment; filename="' . $filenames . '"');
                
                if (!empty($get_info->chemain)) {
                    $xml->asXML($get_info->chemain . '/EDI_TVA_00' . $data[0]->prRegime . '_' . $request->Exercice . '_COMP.xml');
                    // Specify the path for the ZIP file.
                    $zipFileName = $get_info->chemain . '/EDI_TVA_00' . $data[0]->prRegime . '_' . $request->Exercice . '_COMP.zip';
                    // Create a new ZipArchive.
                    $zip = new ZipArchive();

                    if ($zip->open($zipFileName, ZipArchive::CREATE) === true) {
                        // Specify the path to the XML file you want to add to the ZIP archive.
                        $xmlFileName = $get_info->chemain . '/EDI_TVA_00' . $data[0]->prRegime . '_' . $request->Exercice . '_COMP.xml';

                        // Add the XML file to the ZIP archive with a specified name.
                        $zip->addFile($xmlFileName, 'EDI_TVA_00' . $data[0]->prRegime . '_' . $request->Exercice . '_COMP.xml');
                        $zip->close();

                        // Set the appropriate HTTP headers for automatic download.
                        header('Content-Type: application/zip');
                        header('Content-Disposition: attachment; filename="EDI_TVA_00' . $data[0]->prRegime . '_' . $request->Exercice . '_COMP.zip"');
                        readfile($zipFileName);
                    } else {
                        return view('pages.error.error404')->with('message', '.Le chemin n\'est pas valide. Assurez-vous qu\'il est correct');
                    }
                }else{
                    return view('pages.error.error404')->with('message', '.Le chemin n\'existe pas. Assurez-vous qu\'il est saisi correctement');
                }




            } else {
                // $message = "Hello, World!";
                // $script = "alert('" . addslashes($message) . "');";
                // return response($script)->header('Content-Type', 'application/javascript');
                return view('pages.error.error404')->with('message', '.La soumission du formulaire a échoué en raison de données manquantes');
            }


        } catch (\Exception $e) {
            // return redirect()
            //     ->back()
            //     ->with('danger', 'Une erreur s\'est produite. Merci de contacter le service IT.')
            //     ->withInput();

            return view('pages.error.error404')->with('message', '.Une erreur s\'est produite. Merci de contacter le service IT');
        }
    }
}