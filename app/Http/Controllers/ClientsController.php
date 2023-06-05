<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\Clients;
use App\Models\Villes;
use App\Models\Zones;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
     $clients=Clients::get();
     return view("clients.index",compact('clients'));
    }

    public function store(Request $request)
    {
        try {
        //traitement d'ajout
            $ville=new Villes();
            $ville->Ville_Nom=$request->Client_Ville;
            $ville->save();

            $client = new Clients;
            $client->Client_Principale=$request->Client_Principale;
            $client->Client_Societe=$request->Client_Societe;
            $client->Client_Ville = $ville->id;
            $client->Client_Tel=$request->Client_Tel;
            $client->Client_Emails=$request->Client_Emails;
            $client->Client_Note=$request->Client_Note;
            $client->save();

            DB::commit();
            Toastr::success('Create new client successfully :)','Success');
            return redirect("/clients");
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('User add new client fail :)','Error');
            return redirect("/clients");
        }
    }

    public function update(Request $request,$id){
        try {

            $villes = Villes::where('id',$id)->first();
            $villes->update([
                'Ville_Nom'=>$request->Client_Ville,
            ]);

            $clients = Clients::where('id',$id)->first();
            $clients->update([
                'Client_Principale'=>$request->Client_Principale,
                'Client_Societe'=>$request->Client_Societe,
                'Client_Ville'=>$villes->id,
                'Client_Tel'=>$request->Client_Tel,
                'Client_Emails'=>$request->Client_Emails,
                'Client_Note'=>$request->Client_Note,
            ]);

        DB::commit();
        Toastr::success('Client update successfully :)','Success');
        $clients=Clients::get();
       return redirect()->route('clients',compact('clients'));

    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('Client update fail :)','Error');
        return redirect()->route('clients',compact('clients'));
    }


}

    public function delete($id){
        try {
            $client = Clients::find($id);
            if (!$client) {
                return redirect()->back()->with(['error' => 'Client introuvable']);
            }

            $ville = $client->villes;
            if ($ville) {
                $ville->delete(); // supprimer l'enregistrement correspondant dans la table "villes"
            }

            $client->delete(); // supprimer l'enregistrement dans la table "clients"
        DB::commit();
        Toastr::success('Client deleted successfully :)','Success');
       return redirect()->route('clients');

    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('Client deleted fail :)','Error');
        return redirect()->route('clients');
    }

    }

    /** search user */

    public function searchClient(Request $request)
    {
        // Filter by ID
        $id = request('id');
        $name = $request->input('q');
        $ville = $request->input('ville');
        if ($id) {
            $clients = Clients::where('id', $id)->get();
        } else {
            $clients = Clients::join('villes','clients.Client_Ville' , "=", "villes.id")
            ->where('Client_Principale', 'like', '%' . $name . '%')
            ->where('Ville_Nom', 'like','%'.$ville.'%')
            ->get();
        }
        $ville = Villes::all();

        return view('clients.index', compact('clients', 'ville'));
    }
}
