<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\History_Vente;
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
            return redirect('Vente_produit');
        }else{
            return to_route('Vente_Groupe_produit',['IdClient'=>0]);
        }
    }
    public function store2(Request $request)
    {


        $selectproduitId =$request->selectproduit;
        $quantite =$request->quantite;
        $prix =$request->prix;
        $selectClientID =$request->selectClient;
        $request->validate([
            'selectproduit'=>['required','exists:produits,id'],
            'quantite'=>['required'],
            'prix'=>['required'],
            'selectClient'=>['required','exists:clients,id'],
        ]);
        // dd($selectproduit,$quantite , $prix, $selectClient);
        $dataVente=Vente::where('id_client',$selectClientID)->get();
        // dd($dataVente);


        if(!$dataVente->count()){

            Vente::create([
                'id_produit'=> $selectproduitId,
                'id_client'=> $selectClientID,
                'Quantite_vente'=> $quantite,
                'Prix_Vente'=> $prix,
                'validation_Vente'=> false,
                ]);
                History_Vente::create([
                'id_produit'=> $selectproduitId,
                'id_client'=> $selectClientID,
                'Quantite_vente'=> $quantite,
                'Prix_Vente'=> $prix,
                ]);

            return to_route('Pay_client',['codeClient'=>$selectClientID])->with('success',"La vente s'est bien passée, elle est maintenant payée.");
        }else{
            $dataVenteall=Vente::where('id_client',$selectClientID)->where('id_produit',$selectproduitId)->get()->toArray();

            if(!$dataVenteall){
                Vente::create([
                        'id_produit'=> $selectproduitId,
                        'id_client'=> $selectClientID,
                        'Quantite_vente'=> $quantite,
                        'Prix_Vente'=> $prix,
                        'validation_Vente'=> false,
                        ]);

                         History_Vente::create([
                            'id_produit'=> $selectproduitId,
                            'id_client'=> $selectClientID,
                            'Quantite_vente'=> $quantite,
                            'Prix_Vente'=> $prix,
                            ]);
                    return to_route('Pay_client',['codeClient'=>$selectClientID])->with('success',"La vente s'est bien passée, elle est maintenant payée.");

            }else{
                  return back()->with('errorMessage',"c'est Vente est deja passe Choise Un autre produit");
            }



        }




    }

    /**
     * Display the specified resource.
     */
    public function show($IdClient=null)
    {
        //  dd(session());
        $dataClient = Client::all();
        $dataVenteClient=Vente::where('id_client',$IdClient)->get();
        // dd($dataVenteClient);
        return view('Vente_Groupe_produit',compact('dataClient','dataVenteClient'));
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
