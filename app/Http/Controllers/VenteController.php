<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('Vente');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataProduit = Produit::all();
        $dataCLientt = Client::all();

        return view('Vente_Produit',compact('dataProduit','dataCLientt'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $btn1 =$request->btn1;
        // dd($btn1);
        if($btn1=='1_Produit'){
            return to_route('Vente_produit');
        }else{
            return redirect()->to_route('');
        }
    }
    public function store2(Request $request)
    {
        $selectproduit =$request->selectproduit;
        $quantite =$request->quantite;
        $prix =$request->prix;
        $selectClient =$request->selectClient;
        dd($selectproduit,$quantite, $prix , $selectClient);

    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        //
    }
}
