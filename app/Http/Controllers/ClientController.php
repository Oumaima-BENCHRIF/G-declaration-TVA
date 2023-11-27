<?php

namespace App\Http\Controllers;

use App\Models\achat;
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

class ClientController extends Controller
{
    public function index()
    {
        return view('apps.Client');
    }
    public function Stores(Request $request)
    {

       
        try {

            $client = new client();
            $client->nom = $request->input('nomClient');
            $client->Designation = $request->input('Designation');
            $client->Adresse = $request->input('Adresse');
            $client->telephone = $request->input('telephone');
            $client->ville = $request->input('ville');
            $client->save();

            return response()->json([
                'status' => 200,
                'message' => 'Ajouter avec succès',
            ]);
        
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('danger', 'Une erreur s\'est produite. Merci de contacter le service IT.')
                ->withInput();
        }
    }
    public function table_Client()
    {

        $liste_client = client::all();
        if ($liste_client) {
            return response()->json([
                "code" => 200,
                'liste_client' => $liste_client,
            ]);
        } else {
            return response()->json([
                "code" => 500,
                'message' => "Merci de Verifier votre connexion internet",
            ]);
        }
    }
    public function info_Client($id)
    {
        $info_Client = client::where('client.deleted_at', '=', NULL)
            ->where('client.id', $id)->first();
        if ($info_Client != null) {
            return response()->json([
                'info_Client' => $info_Client,
                'status' => 200,
                'message' => 'client existe',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'errors' => 'client n\éxiste pas',
            ]);
        }
    }
    public function Update(Request $request)
    {
        try {

            $update_client = Client::where('id', $request->update_id_Client)->first();

            $update_client->nom = $request->nomClient;
            $update_client->Designation = $request->Designation;
            $update_client->telephone = $request->telephone;
            $update_client->ville = $request->ville;
            $update_client->Adresse = $request->Adresse;
            // dd($update_client);
            $update_client->save();
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
           
            $check = client::where('id', $request->delete_id_Client)->first();
          
            if ($check != null) {
                $niveauurgence = client::find($request->delete_id_Client);
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

}
