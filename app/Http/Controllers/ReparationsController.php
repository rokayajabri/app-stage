<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\BonReception;
use App\Models\Detail_Br;
use App\Models\Produit_Etat_Reparation;
use App\Models\Techniciens;
use App\Models\Transports;
use Illuminate\Http\Request;


class ReparationsController extends Controller
{
    public function index()
    {
     $transports=Transports::get();
     $details_br=Detail_Br::get();
     $receptions=BonReception::get();
     return view("reparations.index",compact('details_br','receptions','transports'));
    }

    public function delete($id){
        try{
        $details_br = Detail_Br::find($id);
        if (!$details_br) {
            return redirect()->route('reparations')->with(([
                'error' => 'reparations non trouvé'
            ]));
        }
        $details_br->delete();
        DB::commit();
        Toastr::success('reparations deleted successfully :)','Success');
        return redirect()->route('reparations');

    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('reparations deleted fail :)','Error');
        return redirect()->route('reparations');
    }

    }

    public function update(Request $request, $id)
    {
        try{
    $detail_br = Detail_Br::with('techniciens')->find($id);

    $etat_reparation = Produit_Etat_Reparation::where('id', $id)->first();
    $etat_reparation->update([
        'EtatReparation_Ref' => $request->dBR_Etat_Reparation,
    ]);

    $technicien = Techniciens::find($detail_br->dBR_Technicien);

    if ($technicien) {
        $technicien->update([
            'Tech_Name' => $request->dBR_Technicien,
        ]);

        $detail_br->dBR_Technicien = $technicien->id;
    } else {
        $technicien = new Techniciens([
            'Tech_Name' => $request->dBR_Technicien,
        ]);

        $technicien->save();

        $detail_br->dBR_Technicien = $technicien->id;
    }

    $detail_br->update([
        'dBR_SN' => $request->dBR_SN,
        'dBR_Problem' => $request->dBR_Problem,
        'dBR_Etat_Reparation' => $etat_reparation->id,
        'dBR_Garantie' => $request->has('dBR_Garantie') ? 'oui' : 'non',
        'dBR_RepairDetail' => $request->dBR_RepairDetail,
        'dBR_Note' => $request->dBR_Note,
        // mettre à jour les autres champs si nécessaire
    ]);

    $detail_br->load('techniciens'); // Mettre à jour la relation avec les techniciens
    DB::commit();
        Toastr::success('reparations update successfully :)','Success');
        return redirect()->route('reparations');

    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('receptions update fail :)','Error');
        return redirect()->route('reparations');
    }
}



    public function searchreparation(Request $request)
    {
        // Filter by ID
        $id = request('id');
        $name = $request->input('q');
        $reception = $request->input('date');
        if ($id) {
            $detail_br = Detail_Br::where('id', $id)->get();
        } else {
            $detail_br = Detail_Br::join('bonreception','detail_br.dBR_BR' , "=", "bonreception.id")
            ->where('dBR_Garantie', 'like', '%' . $name . '%')
            ->where('BR_Date', 'like','%'.$reception.'%')
            ->get();
        }
        $receptions = BonReception::all();

        return view('reparations.index', compact('detail_br', 'receptions'));
    }

}
