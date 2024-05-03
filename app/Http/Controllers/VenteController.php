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
                'Prix_Vente'=> $prix* $quantite,
                'validation_Vente'=> false,
                'facture_imprimé'=>false
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
                        'Prix_Vente'=>  $prix* $quantite,
                        'validation_Vente'=> false,
                        'facture_imprimé'=>false
                        ]);

                         History_Vente::create([
                            'id_produit'=> $selectproduitId,
                            'id_client'=> $selectClientID,
                            'Quantite_vente'=> $quantite,
                            'Prix_Vente'=> $prix,
                            ]);
                    return to_route('Pay_client',['codeClient'=>$selectClientID])->with('success',"La vente s'est bien passée, elle est maintenant payée.");

            }else{
                Vente::where('id_client',$selectClientID)->where('id_produit',$selectproduitId)->update([
                    'id_produit'=> $selectproduitId,
                    'id_client'=> $selectClientID,
                    'Quantite_vente'=> $quantite,
                    'Prix_Vente'=>  $prix* $quantite,
                    'validation_Vente'=> false,
                    'facture_imprimé'=>false
                ]);
                return to_route('Pay_client',['codeClient'=>$selectClientID])->with('success',"la Vente est encore Ajoute un foise");

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
        $dataClientOne = Client::find($IdClient);
        $dataVenteClient=Vente::where('id_client',$IdClient)->where('validation_Vente',0)->get();
        // dd($dataClientOne);
        return view('Vente_Groupe_produit',compact('dataClient','dataVenteClient','dataClientOne'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function AjouteVente_group(Request $request)
    {
        // dd($request->id_client);
        $dataProduit = Produit::all();
        $dataClientOne = Client::find($request->id_client);
       return view('Vente_One_of_groupe_Produit',compact('dataProduit','dataClientOne'));
    }
    public function AjouteVente_group_ps(Request $request)
    {
        $selectproduitId =$request->selectproduit;
        $quantite =$request->quantite;
        $prix =$request->prix;
        $ClientId =$request->id_client;
        $request->validate([
            'selectproduit'=>['required','exists:produits,id'],
            'quantite'=>['required'],
            'prix'=>['required'],
            'id_client'=>['required','exists:clients,id'],
        ]);
       $dataVente = Vente::where('id_client',$ClientId)->where('id_produit',$selectproduitId)->get()->ToArray();

        if(!$dataVente){
            Vente::create([
                'id_produit'=> $selectproduitId,
                'id_client'=> $ClientId,
                'Quantite_vente'=> $quantite,
                'Prix_Vente'=> $prix,
                'validation_Vente'=> false,
                'facture_imprimé'=>false
                ]);
            History_Vente::create([
                    'id_produit'=> $selectproduitId,
                    'id_client'=> $ClientId,
                    'Quantite_vente'=> $quantite,
                    'Prix_Vente'=> $prix,
                    ]);

            return to_route('Vente_Groupe_produit',['IdClient'=> $ClientId])->with('success',"La vente s'est bien Ajoute dans les groupe de vente");
        }else{
            Vente::where('id_client',$ClientId)->where('id_produit',$selectproduitId)->update([
                'id_produit'=> $selectproduitId,
                'id_client'=> $ClientId,
                'Quantite_vente'=> $quantite,
                'Prix_Vente'=> $prix,
                'validation_Vente'=> false,
                'facture_imprimé'=>false
            ]);
            return to_route('Vente_Groupe_produit',['IdClient'=> $ClientId])->with('success',"la Vente est encore Ajoute un foise ");
        }
        // dd($request->id_client);
    //     $dataProduit = Produit::all();
    //    return view('Vente_One_of_groupe_Produit',compact('dataProduit'));
    }
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
    public function destroy(Request $request)
    {
        Vente::findOrFail($request->id_vente)->delete();
        // dd($dataDeletVente);
       return to_route('Vente_Groupe_produit',['IdClient'=>$request->id_Client]);
    }
}
