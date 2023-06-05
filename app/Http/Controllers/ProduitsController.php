<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Cathegories;
use App\Models\Produits;
use Illuminate\Http\Request;
use DB;

class ProduitsController extends Controller
{
    public function index()
    {
    $Cathegories = Cathegories::all();
     $produits=Produits::get();
     return view("produits.index",compact('produits','Cathegories'));
    }
    public function searchProduct(Request $request)
    {
        // Filter by ID
        $id = request('id');
        $name = $request->input('q');
        $categorie = $request->input('categorie');
        if ($id) {
            $produits = Produits::where('id', $id)->get();
        } else {
            $produits = Produits::join('cathegories','produits.produit_cath' , "=", "cathegories.id")
            ->where('Produit_Ref', 'like', '%' . $name . '%')
            ->where('Cath_Nom', 'like','%'.$categorie.'%')
            ->get();
        }
        $Cathegories = Cathegories::all();

        return view('produits.index', compact('produits', 'Cathegories'));
    }

    public function store(Request $request)
    {
        try {
        $cathegories=new Cathegories();
        if($request->Nouvelle_Cathegorie) {
            $cathegories->Cath_Nom = $request->Nouvelle_Cathegorie;
        } else {
            $cathegories->Cath_Nom = $request->Produit_Cath;
        }
        $cathegories->Cath_Designation = $request->Cath_Designation;
        $cathegories->save();

        $produit = new Produits;
        $produit->Produit_Ref=$request->Produit_Ref;
        $produit->Produit_Cath=$cathegories->id;
        $produit->Produit_Description=$request->Produit_Description;
        $produit->save();

        DB::commit();
        Toastr::success('product add successfully :)','Success');
        return redirect("/produits");
    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('product add fail :)','Error');
        return redirect("/produits");
    }
    }


    public function update(Request $request, $id)
    {
        try {
            $produits = Produits::get();

            $cathegories = Cathegories::findOrFail($id);
            $cathegories->update([
                'Cath_Nom' => $request->Produit_Cath,
            ]);

            $produit = Produits::findOrFail($id);
            $produit->update([
                'Produit_Ref' => $request->Produit_Ref,
                'Produit_Cath' => $cathegories->id,
                'Produit_Description' => $request->Produit_Description,
            ]);

            DB::commit();
            Toastr::success('Product updated successfully :)', 'Success');
            return redirect()->route('produits', compact('produits'));
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Product update failed :(', 'Error');
            return redirect()->route('produits', compact('produits'));
        }
    }


    public function delete($id){
        try {
        $produit = Produits::find($id);
        if (!$produit) {
            return redirect()->route('produits')->with(([
                'error' => 'produit non trouvé'
            ]));
        }

        $cathegorie = Cathegories::find($produit->Produit_Cath);
        if ($cathegorie) {
            $cathegorie->delete();
        }

        $produit->delete();

        DB::commit();
        Toastr::success('product deleted successfully :)','Success');
        return redirect()->route('produits');
    } catch(\Exception $e) {
        DB::rollback();
        Toastr::error('product deleted fail :)','Error');
        return redirect()->route('produits');
    }
    }

}

