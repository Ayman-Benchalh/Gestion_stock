<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('Achat');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataProduit = Produit::all();
        $dataCLientt = Fournisseur::all();

        return view('Achat_Produit',compact('dataProduit','dataCLientt'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $btn1 =$request->btn1;
        // dd($btn1);
        if($btn1=='1_Produit'){
            return to_route('Achat_produit');
        }else{
            return to_route('Achat_Groupe_produit',['IdFournisseur'=>0]);
        }
    }
    public function store2(Request $request)
    {
        $selectproduitId =$request->selectproduit;
        $NomProduit =$request->NomProduit;
        $desigProduit =$request->desigProduit;

        $quantite =$request->quantite;
        $prix =$request->prix;
        $selectFourniID =$request->selectFourni;
        $dataFourniss = Fournisseur::findOrfail($selectFourniID);
        $dataAchat = Achat::where('id_fournisseur',$selectFourniID)->where('id_produit',$selectproduitId)->get()->ToArray();
        $dataproduit=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',null)->first();
        $dataproduitthree=Produit::where('id',$selectproduitId)->first();
        $NameProduitNew=$dataproduitthree->Nom_Prod.'_N'. Str::random(3);
        if($selectproduitId){
                    $request->validate([
                            'selectproduit'=>['required','exists:produits,id'],
                            'quantite'=>['required'],
                            'prix'=>['required'],
                            'selectFourni'=>['required','exists:fournisseurs,id'],
                        ]);

                    // $dataProduit = Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->get()->ToArray();
                    // $dataAchat = Achat::where('id_produit',$selectproduitId)->where('id_fournisseur',$selectFourniID)->get()->ToArray();

                    // dd($dataAchat);
                    // $dataAchat=Achat::where('id_produit',$selectproduitId)->where('id_fournisseur',$selectFourniID)->get();
                    if(!$dataAchat){
                        if($dataproduit){
                            Produit::findOrfail($selectproduitId)->update([
                                'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                             ]);
                        }else{
                            $dataproduitfor=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();
                            if($dataproduitfor){
                                Produit::findOrfail($selectproduitId)->update([

                                    'Quantité'=>$dataproduitfor->Quantité+$quantite,
                                    'Prix'=>$prix,
                                 ]);
                            }else{
                                Produit::create([
                                'Nom_Prod'=>$NameProduitNew,
                                'Designation_Prod'=>$dataproduitthree->Designation_Prod,
                                'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                                'Quantité'=>$quantite,
                                'Prix'=>$prix,
                            ]);
                            }


                        }
                            // Achat::create([
                            //     'id_fournisseur'=>$selectFourniID,
                            //     'id_produit'=>$selectproduitId,
                            //     'Quantite_Achat'=> $quantite,
                            //     'Prix_Achat'=> $prix,
                            //     'validation_Achat'=> false,
                            //     'facture_imprimé'=> false,
                            // ]);
                     $dataproduitTow=Produit::where('Nom_Prod',$NameProduitNew)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();
                        if($dataproduitTow){
                            Achat::create([
                                'id_produit'=> $dataproduitTow->id,
                                'id_fournisseur'=> $selectFourniID,
                                'Quantite_Achat'=> $quantite,
                                'Prix_Achat'=> $prix*$quantite,
                                'validation_Achat'=> false,
                                'facture_imprimé'=>false
                                ]);
                        }else{
                            return back()->with('error','Achat echec par ce que le produit il a deja un fournisseur');
                        }
                        //  dd('create sucssec');
                        return to_route('Pay_fournisseur',['codeFournisseur'=>$selectFourniID])->with('success','Achat est passe bien');
                    }else{

                        // Achat::where('id_produit',$selectproduitId)->where('id_fournisseur',$selectFourniID)->update([
                        //     'Quantite_Achat'=> $quantite,
                        //     'Prix_Achat'=> $prix,
                        //     'validation_Achat'=> false,
                        //     'facture_imprimé'=> false,
                        // ]);
                        Achat::where('id_fournisseur',$selectFourniID)->where('id_produit',$selectproduitId)->update([
                            'id_produit'=> $selectproduitId,
                            'id_fournisseur'=> $selectFourniID,
                            'Quantite_Achat'=> $quantite,
                            'Prix_Achat'=> $prix*$quantite,
                            'validation_Achat'=> false,
                            'facture_imprimé'=>false
                        ]);
                        //  dd('update sucssec');
                        return to_route('Pay_fournisseur',['codeFournisseur'=>$selectFourniID])->with('success','Update Achat est passe bien');
                    }



        }else{
            $request->validate([
                'NomProduit'=>['required'],
                'desigProduit'=>['required'],
                'quantite'=>['required'],
                'prix'=>['required'],
                'selectFourni'=>['required','exists:fournisseurs,id'],
            ]);
            $datapro= Produit::where('Nom_Prod',$NomProduit)->first();
            // dd($datapro);
            if(!$datapro){
                Produit::create([
                        'Nom_Prod'=>$NomProduit,
                        'Designation_Prod'=>$desigProduit,
                        'Quantité'=>$quantite,
                        'Prix'=>$prix,
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                ]);
                $datapro2= Produit::where('Nom_Prod',$NomProduit)->first();
                Achat::create([
                    'id_fournisseur'=>$selectFourniID,
                    'id_produit'=>$datapro2->id,
                    'Quantite_Achat'=> $quantite,
                    'Prix_Achat'=> $prix,
                    'validation_Achat'=> false,
                    'facture_imprimé'=> false,
                 ]);

                //  dd('produit is created now insert in table achat ',$datapro2->id);
                 return to_route('Pay_fournisseur',['codeFournisseur'=>$selectFourniID])->with('success','Achat est passe bien est creae un nouveau produit');


            }else{
                // Produit::where('Nom_Prod',$NomProduit)->update([
                //     'Designation_Prod'=>$desigProduit,
                //     'Quantité'=>$quantite,
                //     'Prix'=>$prix,
                // ]);
                $dataproduit=Produit::where('Nom_Prod',$NomProduit)->where('Nom_Fournisseur',null)->first();
                if($dataproduit){
                    Produit::findOrfail($datapro->id)->update([
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                        'Designation_Prod'=>$desigProduit,
                        'Quantité'=>$quantite,
                        'Prix'=>$prix,
                     ]);
                }else{
                    $dataproduitfor=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();
                    if($dataproduitfor){
                        Produit::findOrfail($selectproduitId)->update([

                            'Quantité'=>$dataproduitfor->Quantité+$quantite,
                            'Prix'=>$prix,
                         ]);
                    }else{
                        Produit::create([
                        'Nom_Prod'=>$NameProduitNew,
                        'Designation_Prod'=>$dataproduitthree->Designation_Prod,
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                        'Quantité'=>$quantite,
                        'Prix'=>$prix,
                    ]);
                    }
                        // Produit::create([
                        //         'Nom_Prod'=>$NomProduit,
                        //         'Designation_Prod'=>$desigProduit,
                        //         'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                        //         'Designation_Prod'=>$desigProduit,
                        //         'Quantité'=>$quantite,
                        //         'Prix'=>$prix,
                        // ]);

                }
               $dataAchte= Achat::where('id_produit',$datapro->id)->where('id_fournisseur',$selectFourniID)->get();
                if(!$dataAchte){
                    Achat::create([
                        'id_fournisseur'=>$selectFourniID,
                        'id_produit'=>$datapro->id,
                        'Quantite_Achat'=> $quantite,
                        'Prix_Achat'=> $prix,
                        'validation_Achat'=> false,
                        'facture_imprimé'=> false,
                     ]);
                }else{
                    Achat::where('id_produit',$datapro->id)->where('id_fournisseur',$selectFourniID)->update([
                        'Quantite_Achat'=> $quantite,
                        'Prix_Achat'=> $prix,
                        'validation_Achat'=> false,
                        'facture_imprimé'=> false,
                    ]);
                }


                // dd(' this prduit its in data base');
                return to_route('Pay_fournisseur',['codeFournisseur'=>$selectFourniID])->with('success','Achat est passe bien est update produit');
            }


        }




    }

    /**
     * Display the specified resource.
     */
    public function show($IdFournisseur=null)
    {
        //  dd(session());
        $dataFourni = Fournisseur::all();
        $dataFourniOne = Fournisseur::find($IdFournisseur);
        $dataAchatFourni=Achat::where('id_fournisseur',$IdFournisseur)->where('validation_Achat',0)->get();
        // dd($dataClientOne);
        return view('Achat_Groupe_produit',compact('dataFourni','dataFourniOne','dataAchatFourni'));
    }
    public function AjouteAchat_group(Request $request)
    {
        // dd($request->id_client);
        $dataProduit = Produit::all();
        $dataFourniOne = Fournisseur::find($request->id_Fournisseur);
       return view('Achat_One_of_groupe_Produit',compact('dataProduit','dataFourniOne'));
    }
    public function AjouteAchat_group_ps(Request $request)
    {
        $selectproduitId =$request->selectproduit;
        $NomProduit =$request->NomProduit;
        $desigProduit =$request->desigProduit;
        $quantite =$request->quantite;
        $prix =$request->prix;
        $fournisseurID =$request->id_fournisseur;
        $dataFourniss = Fournisseur::findOrfail($fournisseurID);
        $dataAchat = Achat::where('id_fournisseur',$fournisseurID)->where('id_produit',$selectproduitId)->get()->ToArray();
        $dataproduit=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',null)->first();
        $dataproduitthree=Produit::where('id',$selectproduitId)->first();
        $NameProduitNew=$dataproduitthree->Nom_Prod.'_N'. Str::random(3);
        if($selectproduitId){

                $request->validate([
                            'selectproduit'=>['required','exists:produits,id'],
                            'quantite'=>['required'],
                            'prix'=>['required'],
                            'id_fournisseur'=>['required','exists:fournisseurs,id'],
                        ]);




                // dd($dataproduitthree);
                        if(!$dataAchat){
                                if($dataproduit){
                                    Produit::findOrfail($selectproduitId)->update([
                                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                                     ]);
                                }else{
                                    $dataproduitfor=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();
                                    if($dataproduitfor){
                                        Produit::findOrfail($selectproduitId)->update([

                                            'Quantité'=>$dataproduitfor->Quantité+$quantite,
                                            'Prix'=>$prix,
                                         ]);
                                    }else{
                                        Produit::create([
                                        'Nom_Prod'=>$NameProduitNew,
                                        'Designation_Prod'=>$dataproduitthree->Designation_Prod,
                                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                                        'Quantité'=>$quantite,
                                        'Prix'=>$prix,
                                    ]);
                                    }


                                }
                        $dataproduitTow=Produit::where('Nom_Prod',$NameProduitNew)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();
                        if($dataproduitTow){
                            Achat::create([
                                'id_produit'=> $dataproduitTow->id,
                                'id_fournisseur'=> $fournisseurID,
                                'Quantite_Achat'=> $quantite,
                                'Prix_Achat'=> $prix*$quantite,
                                'validation_Achat'=> false,
                                'facture_imprimé'=>false
                                ]);
                        }else{
                            return back()->with('error','Achat echec par ce que le produit il a deja un fournisseur');
                        }



                            // History_Vente::create([
                            //         'id_produit'=> $selectproduitId,
                            //         'id_client'=> $ClientId,
                            //         'Quantite_vente'=> $quantite,
                            //         'Prix_Vente'=> $prix,
                            //         ]);

                            return to_route('Achat_Groupe_produit',['IdFournisseur'=> $fournisseurID])->with('success',"La vente s'est bien Ajoute dans les groupe de vente");
                        }else{
                            Achat::where('id_fournisseur',$fournisseurID)->where('id_produit',$selectproduitId)->update([
                                'id_produit'=> $selectproduitId,
                                'id_fournisseur'=> $fournisseurID,
                                'Quantite_Achat'=> $quantite,
                                'Prix_Achat'=> $prix*$quantite,
                                'validation_Achat'=> false,
                                'facture_imprimé'=>false
                            ]);
                            return to_route('Achat_Groupe_produit',['IdFournisseur'=> $fournisseurID])->with('success',"la Vente est encore Ajoute un foise ");
                        }

        }else{

            $request->validate([
                'NomProduit'=>['required'],
                'desigProduit'=>['required'],
                'quantite'=>['required'],
                'prix'=>['required'],
                'id_fournisseur'=>['required','exists:fournisseurs,id'],
            ]);
            // dd('llll',$selectproduitId , $NomProduit ,$desigProduit, $quantite,$prix,$fournisseurID );
            $datapro= Produit::where('Nom_Prod',$NomProduit)->first();
            // $NameProduitNew=$dataproduitthree->Nom_Prod.'_N'. Str::random(3);
            if(!$datapro){
                Produit::create([
                        'Nom_Prod'=>$NomProduit,
                        'Designation_Prod'=>$desigProduit,
                        'Quantité'=>$quantite,
                        'Prix'=>$prix,
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                ]);
                $datapro2= Produit::where('Nom_Prod',$NomProduit)->first();
                Achat::create([
                    'id_fournisseur'=>$fournisseurID,
                    'id_produit'=>$datapro2->id,
                    'Quantite_Achat'=> $quantite,
                    'Prix_Achat'=> $prix*$quantite,
                    'validation_Achat'=> false,
                    'facture_imprimé'=> false,
                 ]);

                //  dd('produit is created now insert in table achat ',$datapro2->id);
                return to_route('Achat_Groupe_produit',['IdFournisseur'=> $fournisseurID])->with('success',"La vente s'est bien Ajoute dans les groupe de vente");


            }else{
                $dataproduit=Produit::where('Nom_Prod',$NomProduit)->where('Nom_Fournisseur',null)->first();
                if($dataproduit){
                    Produit::findOrfail($datapro->id)->update([
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                        'Designation_Prod'=>$desigProduit,
                        'Quantité'=>$datapro->Quantité+$quantite,
                        'Prix'=>$prix,
                     ]);
                }else{
                    $dataproduitfor=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();
                    if($dataproduitfor){
                        Produit::findOrfail($selectproduitId)->update([
                            'Quantité'=>$dataproduitfor->Quantité+$quantite,
                            'Prix'=>$prix,
                         ]);
                    }else{
                        Produit::create([
                        'Nom_Prod'=>$NameProduitNew,
                        'Designation_Prod'=>$dataproduitthree->Designation_Prod,
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                         'Quantité'=>$quantite,
                        'Prix'=>$prix,
                    ]);
                    }

                        // Produit::create([
                        //         'Nom_Prod'=>$NomProduit,
                        //         'Designation_Prod'=>$desigProduit,
                        //         'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                        //         'Designation_Prod'=>$desigProduit,
                        //         'Quantité'=>$quantite,
                        //         'Prix'=>$prix,
                        // ]);

                }
               $dataAchte= Achat::where('id_produit',$datapro->id)->where('id_fournisseur',$fournisseurID)->get();
                if(!$dataAchte){
                    Achat::create([
                        'id_fournisseur'=>$fournisseurID,
                        'id_produit'=>$datapro->id,
                        'Quantite_Achat'=> $quantite,
                        'Prix_Achat'=> $prix*$quantite,
                        'validation_Achat'=> false,
                        'facture_imprimé'=> false,
                     ]);
                }else{
                    Achat::where('id_produit',$datapro->id)->where('id_fournisseur',$fournisseurID)->update([
                        'Quantite_Achat'=> $quantite,
                        'Prix_Achat'=> $prix*$quantite,
                        'validation_Achat'=> false,
                        'facture_imprimé'=> false,
                    ]);
                }


                // dd(' this prduit its in data base');
                return to_route('Achat_Groupe_produit',['IdFournisseur'=> $fournisseurID])->with('success',"La vente s'est bien Ajoute dans les groupe de vente");
            }


        }

        // dd($request->id_client);
    //     $dataProduit = Produit::all();
    //    return view('Vente_One_of_groupe_Produit',compact('dataProduit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achat $achat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achat $achat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    { Achat::findOrFail($request->id_fournisseur)->delete();
        // dd($dataDeletVente);
       return to_route('Achat_Groupe_produit',['IdFournisseur'=>$request->id_fournisseur]);
    }
}
