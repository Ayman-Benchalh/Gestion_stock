<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('AjouteProduits');
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
        $prix=$request->prix;
        $dataProduit= Produit::where('Nom_Prod',$nomproduit)->first();

        $request->validate([
            'nomproduit'=>['required','min:4'],
            'designation'=>['required','min:4'],
            'quantité'=>['required','min:1'],
            'prix'=>['required','min:1'],
        ]);
        if(!$dataProduit){
                Produit::create([
                    'Nom_Prod'=>$nomproduit,
                    'Designation_Prod'=> $designation,
                    'Quantité'=>$quantité,
                    'Prix'=>$prix,
                    'Nom_Fournisseur'=>null,
                ]);
                return to_route('Ajoute_produit')->with('success','Le produit est Bien Ajoute ');
        }else{
            Produit::where('Nom_Prod',$nomproduit)->update([
                'Quantité'=>$quantité,
                'Prix'=>$prix,
            ]);
            return to_route('Ajoute_produit')->with('success','Le produit est bien mise à jour');

        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
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
    public function destroy(Produit $produit)
    {
        //
    }
}
