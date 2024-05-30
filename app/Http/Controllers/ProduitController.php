<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataFourni=Fournisseur::all();
        return view('AjouteProduits',compact('dataFourni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nomproduit=$request->nomproduit;
        $designation=$request->designation;
        $quantité=$request->quantité;
        $catégorie=$request->Catégorie;
        $prix=$request->prix;
        $Nom_fourni=$request->Nom_fourni;
        $dataProduit= Produit::where('Nom_Prod',$nomproduit)->first();

        $request->validate([
            'nomproduit'=>['required','min:4'],
            'designation'=>['required','min:4'],
            'Catégorie'=>['required','min:1'],
            'quantité'=>['required','min:1'],
            'prix'=>['required','min:1'],
            'Nom_fourni'=>['required','exists:fournisseurs,nom_Complet'],
        ]);
        if(!$dataProduit){
            // dd($Catégorie);
                Produit::create([
                    'Nom_Prod'=>$nomproduit,
                    'Designation_Prod'=> $designation,
                    'Quantité'=>$quantité,
                    'Catégorie'=>$catégorie,
                    'Prix'=>$prix,
                    'Nom_Fournisseur'=>$Nom_fourni,
                ]);
                return to_route('Ajoute_produit_all')->with('success','Le produit est Bien Ajoute ');
        }else{
            Produit::where('Nom_Prod',$nomproduit)->update([
                'Nom_Fournisseur'=>$Nom_fourni,
                'Quantité'=>$quantité,
                'Prix'=>$prix,
            ]);
            return to_route('Ajoute_produit_all')->with('success','Le produit est bien mise à jour');

        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        $dataProduit = Produit::paginate(5);

        return view('All_produit_page',compact('dataProduit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    { $dataProduit= Produit::paginate(5);
        $dataProduitAll=  Produit::findOrfail($request->idClient);
        if($dataProduitAll){
          $dataProduitAll->delete();
          return redirect()->route('Ajoute_produit_all',compact('dataProduit'))->with('success','Client est supprimer bien');
        }else{
          return redirect()->route('Ajoute_produit_all',compact('dataProduit'))->with('errorMessage','Error le Client est Ne pas supprimer ');
        }

    }
}
