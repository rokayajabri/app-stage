<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\BonReception;
use App\Models\Clients;
use App\Models\Detail_Br;
use App\Models\Produit_Etat_Reparation;
use App\Models\Produits;
use App\Models\TemporaryTable;
use App\Models\Transports;
use App\Models\Villes;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ReceptionsController extends Controller
{
    public function index()
    {
     $Detail_Br=Detail_Br::get();
     $receptions=BonReception::get();
     $clients = Clients::all();
     $produits = Produits::all();
     $TemporaryTables = TemporaryTable::get();
     return view("receptions.index",compact('receptions','Detail_Br','clients','produits','TemporaryTables'));
    }

    public function searchreception(Request $request)
    {
        // Filter by ID
        $id = request('id');
        if ($id) {
            $receptions = BonReception::where('id', $id)->get();
        } else {
            $query = BonReception::query();

            // Filter by name
            if ($request->has('date')) {
                $name = $request->input('date');
                $query->where('BR_Date', 'like', '%' . $name . '%');
            }

            // Filter by category
            if ($request->has('client')) {
                $client = $request->input('client');
                $query->whereHas('clients', function ($date) use ($client) {
                    $date->where('Client_Principale', $client);
                });
            }

            $receptions = $query->with('clients')->get();
        }
        $clients = Clients::all();

        return view('receptions.index', compact('receptions','clients'));
    }



    public function store(Request $request)
{
    try{
    $transport = Transports::where('Transport_Nom', $request->BR_Transporte)->first();
    if (!$transport) {
        $transport = new Transports();
        $transport->Transport_Nom = $request->BR_Transporte;
        $transport->save();
    }
    $transport_id = $transport->id;

    $client = Clients::where('Client_Principale', $request->BR_Client)->first();
    if (!$client) {
        $ville = new Villes();
        $ville->Ville_Nom = $request->Client_Ville;

        $ville->save();
        $client = new Clients();
        $client->Client_Principale = $request->BR_Client;
        $client->Client_Societe = $request->Client_Societe;
        $client->Client_Ville = $ville->id;
        $client->save();
    }
    $client_id = $client->id;

    $produit_Etat_R = new Produit_Etat_Reparation();
    $produit_Etat_R->EtatReparation_Ref=$request->dBR_Etat_Reparation;
    $produit_Etat_R->save();
    $etat_id = $produit_Etat_R->id;

    // Recherche du produit dans la base de données
    $produit = Produits::where('Produit_Ref', $request->dBR_Produit)->first();
    // Si le produit n'existe pas, on crée un nouveau produit
    if (!$produit){
        $produit = new Produits();
        $produit->Produit_Ref = $request->dBR_Produit;
        $produit->save();
    }
    // Utilisation de l'ID du produit existant ou nouvellement créé
    $produit_id = $produit->id;

    $temporaryRow = new TemporaryTable();
    $temporaryRow->BR_Date = $request->BR_Date;
    $temporaryRow->BR_Client = $client_id;
    $temporaryRow->BR_Qte = $request->input('BR_Qte', 1);
    $temporaryRow->BR_Transporte = $transport_id;
    $temporaryRow->BR_Note = $request->BR_Note;
    $temporaryRow->dBR_SN = $request->dBR_SN;
    $temporaryRow->dBR_Produit = $produit_id;
    $temporaryRow->dBR_Etat_Reparation = $etat_id;
    $temporaryRow->dBR_Garantie = $request->has('dBR_Garantie') ? 'oui' : 'non';
    $temporaryRow->dBR_Accessoires = $request->dBR_Accessoires;

    if ($request->input('action') == 'add') {
        $temporaryRow->save();
        return redirect('receptions');
    }  elseif ($request->input('action') == 'valider') {
        $temporary = TemporaryTable::all();
        $totalQte = 0;
        foreach ($temporary as $temp) {
            $totalQte += $temp->BR_Qte;
        }
        $bonreception = new BonReception();
        $bonreception->BR_Date = date('Y-m-d');
        $bonreception->BR_Client = $temp->BR_Client;
        $bonreception->BR_Qte = $totalQte;
        $bonreception->BR_Transporte = $temp->BR_Transporte;
        $bonreception->BR_Note = $temp->BR_Note;
        $bonreception->BR_NoDocument = $temp->BR_NoDocument;
        $bonreception->save();

        // Récupération des données de la table bonreception
        $bonreception = BonReception::latest()->first();

       // Créer un tableau pour stocker les valeurs de dBR_Produit
        $produits = array();
        foreach ($temporary as $temp) {
            for ($i = 0; $i < $temp->BR_Qte; $i++) {
                $produits[] = $temp->dBR_Produit;
            }
        }

        // Vérification de la quantité
        if ($bonreception->BR_Qte >= 1) {

        // Boucle pour chaque élément
        for ($i = 0; $i < $bonreception->BR_Qte; $i++) {
            $detail = new Detail_Br;
            $detail->dBR_BR = $bonreception->id;
            // Accéder à chaque valeur de $produits dans la boucle
            $detail->dBR_Produit = $produits[$i];
            $detail->dBR_SN = $temp->dBR_SN;
            $detail->dBR_Etat_Reparation=$temp->dBR_Etat_Reparation;
            $detail->dBR_Garantie = $temp->dBR_Garantie;
            $detail->dBR_Accessoires = $temp->dBR_Accessoires;
            $detail->save();
  }
}

}
       // Supprimer toutes les lignes de la table temporaire
       TemporaryTable::truncate();
       // Rediriger vers la page d'affichage des bons de réception

       DB::commit();
        Toastr::success('receptions Add successfully :)','Success');
        return redirect()->route('receptions');

    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('receptions Add fail :)','Error');
        return redirect()->route('receptions');
    }
}

        public function delete($id){
            try{
            $bonreception = BonReception::find($id);
            if (!$bonreception) {
                return redirect()->route('receptions')->with(([
                    'error' => 'receptions non trouvé'
                ]));
            }

            $detail_br = Detail_Br::find($bonreception->dBR_Produit);
            if ($detail_br) {
                $detail_br->delete();
            }

            $bonreception->delete();

            DB::commit();
        Toastr::success('receptions deleted successfully :)','Success');
        return redirect()->route('receptions');

    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('receptions deleted fail :)','Error');
        return redirect()->route('receptions');
    }
}

        public function update(Request $request, $id)
        {
            try{
            $bonreception = BonReception::find($id);
            $client = Clients::findOrFail($request->BR_Client);

            $transport = Transports::find($bonreception->BR_Transporte);

            if ($transport) {
                $transport->update([
                    'Transport_Nom' => $request->BR_Transporte,
                ]);
            }
            $bonreception->update([
                'BR_Date' => $request->BR_Date,
                'BR_Client' => $client->id,
                'BR_Qte' => $request->BR_Qte,
                'BR_Note' => $request->BR_Note,
                'BR_NoDocument' => $request->BR_NoDocument,
            ]);
            $bonreception->load('Transports');

            // Enregistrement réussi client

            $detail_br = Detail_Br::where('dBR_BR', $id)->first();
            $produit = Produits::findOrFail($request->dBR_Produit);
            $produit->update([
                'created_at' => Carbon::parse($produit->created_at)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            if ($detail_br) {
                $detail_br->update([
                    'dBR_BR' => $bonreception->id,
                    'dBR_Produit' => $produit->id,
                    'dBR_SN' => $request->dBR_SN,
                    'dBR_Garantie' => $request->has('dBR_Garantie') ? 'oui' : 'non',
                    'dBR_Accessoires' => $request->dBR_Accessoires,
                    // mettre à jour les autres champs si nécessaire
                ]);
            }
            DB::commit();
            Toastr::success('receptions update successfully :)','Success');
            return redirect()->route('receptions');

            } catch(\Exception $e) {
                DB::rollback();
                Toastr::error('receptions update fail :)','Error');
                return redirect()->route('receptions');
            }

        }

}



