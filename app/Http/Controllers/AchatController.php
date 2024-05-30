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
    public function create($IdFournisseur=null)
    {

        // dd($IdFournisseur);
        $dataFourni = Fournisseur::all();
        $dataFourniOne = Fournisseur::findOrfail($IdFournisseur);
        // $dataCLientone = Fournisseur::find($IdFournisseur);
        // $dataCLientt = Fournisseur::all();
        $dataProduit = Produit::where('Nom_Fournisseur',$dataFourniOne->nom_Complet)->get();

        // dd( $dataProduit);
        return view('Achat_Produit',compact('dataProduit','dataFourni','dataFourniOne'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $btn1 =$request->btn1;
        // dd($btn1);
        if($btn1=='1_Produit'){
            return to_route('Achat_produit_de',['IdFournisseur'=>1]);
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

        if($selectproduitId){
                    $request->validate([
                            'selectproduit'=>['required','exists:produits,id'],
                            'quantite'=>['required'],
                            'prix'=>['required'],
                            'selectFourni'=>['required','exists:fournisseurs,id'],
                        ]);

                       $dataproduitTow=Produit::where('Nom_Prod', $dataproduitthree->Nom_Prod)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();

                    if(!$dataAchat){
                        if($dataproduit){
                            Produit::findOrfail($selectproduitId)->update([
                                'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                             ]);
                             Achat::create([
                                'id_produit'=> $selectproduitId,
                                'id_fournisseur'=> $selectFourniID,
                                'Quantite_Achat'=> $quantite,
                                'Prix_Achat'=> $prix*$quantite,
                                'validation_Achat'=> false,
                                'facture_imprimé'=>false
                                ]);
                        }else{
                            $dataproduitfor=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();

                            if($dataproduitfor){
                                Produit::findOrfail($selectproduitId)->update([

                                    'Quantité'=>$dataproduitfor->Quantité+$quantite,
                                    'Prix'=>$prix,
                                 ]);
                                 Achat::create([
                                    'id_produit'=> $selectproduitId,
                                    'id_fournisseur'=> $selectFourniID,
                                    'Quantite_Achat'=> $quantite,
                                    'Prix_Achat'=> $prix*$quantite,
                                    'validation_Achat'=> false,
                                    'facture_imprimé'=>false
                                    ]);
                            }else{
                                Produit::create([
                                'Nom_Prod'=>$dataproduitthree->Nom_Prod,
                                'Designation_Prod'=>$dataproduitthree->Designation_Prod,
                                'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                                'Quantité'=>$quantite,
                                'Prix'=>$prix,
                                    ]);
                                $dataproduitTow=Produit::where('Nom_Prod',$dataproduitthree->Nom_Prod)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();

                                    Achat::create([
                                        'id_produit'=> $dataproduitTow->id,
                                        'id_fournisseur'=> $selectFourniID,
                                        'Quantite_Achat'=> $quantite,
                                        'Prix_Achat'=> $prix*$quantite,
                                        'validation_Achat'=> false,
                                        'facture_imprimé'=>false
                                        ]);
                            }


                        }

                        return to_route('Pay_fournisseur',['codeFournisseur'=>$selectFourniID])->with('success','Achat est passe bien');
                    }else{


                        Achat::create([
                            'id_produit'=> $selectproduitId,
                            'id_fournisseur'=> $selectFourniID,
                            'Quantite_Achat'=> $quantite,
                            'Prix_Achat'=> $prix*$quantite,
                            'validation_Achat'=> false,
                            'facture_imprimé'=>false
                        ]);

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

                $dataproduit=Produit::where('Nom_Prod',$NomProduit)->where('Nom_Fournisseur',null)->first();

                // $NameProduitNew=$dataproduitthree->Nom_Prod.'_N_'.rand(1,100);
                if($dataproduit){
                    Produit::findOrfail($datapro->id)->update([
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                        'Designation_Prod'=>$desigProduit,
                        'Quantité'=>$dataproduit->Quantité+$quantite,
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
                        'Nom_Prod'=>$NomProduit,
                        'Designation_Prod'=>$desigProduit,
                        'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                        'Quantité'=>$quantite,
                        'Prix'=>$prix,
                    ]);
                    }


                }


                Achat::create([
                    'id_fournisseur'=>$selectFourniID,
                    'id_produit'=>$datapro->id,
                    'Quantite_Achat'=> $quantite,
                    'Prix_Achat'=> $prix,
                    'validation_Achat'=> false,
                    'facture_imprimé'=> false,
                 ]);
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
    //   dd($IdFournisseur);
        $dataFourni = Fournisseur::all();
        $dataFourniOne = Fournisseur::find($IdFournisseur);
        $dataAchatFourni=Achat::where('id_fournisseur',$IdFournisseur)->where('validation_Achat',0)->get();
        // dd($dataClientOne);
        return view('Achat_Groupe_produit',compact('dataFourni','dataFourniOne','dataAchatFourni'));
    }
    public function AjouteAchat_group(Request $request,$idFournisseur)
    {
        // dd($idFournisseur);
        $dataFourniOne = Fournisseur::find($idFournisseur);
        $dataProduit = Produit::where('Nom_Fournisseur',$dataFourniOne->nom_Complet)->get();
        // dd( $dataProduit );
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


        if($selectproduitId){

                $request->validate([
                            'selectproduit'=>['required','exists:produits,id'],
                            'quantite'=>['required'],
                            'prix'=>['required'],
                            'id_fournisseur'=>['required','exists:fournisseurs,id'],
                        ]);




                        if(!$dataAchat){

                                    if($dataproduit){

                                        Produit::findOrfail($selectproduitId)->update([
                                            'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                                        ]);
                                        $dataproduitfor=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();

                                        Achat::create([
                                            'id_produit'=> $dataproduitfor->id,
                                            'id_fournisseur'=> $fournisseurID,
                                            'Quantite_Achat'=> $quantite,
                                            'Prix_Achat'=> $prix*$quantite,
                                            'validation_Achat'=> false,
                                            'facture_imprimé'=>false
                                            ]);

                                    }else{
                                        $dataproduitfor=Produit::where('id',$selectproduitId)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();
                                        if($dataproduitfor){
                                            Produit::findOrfail($selectproduitId)->update([

                                                'Quantité'=>$dataproduitfor->Quantité+$quantite,
                                                'Prix'=>$prix,
                                            ]);
                                            Achat::create([
                                                'id_produit'=> $dataproduitfor->id,
                                                'id_fournisseur'=> $fournisseurID,
                                                'Quantite_Achat'=> $quantite,
                                                'Prix_Achat'=> $prix*$quantite,
                                                'validation_Achat'=> false,
                                                'facture_imprimé'=>false
                                                ]);
                                        }else{
                                            Produit::create([
                                            'Nom_Prod'=>$dataproduitthree->Nom_Prod,
                                            'Designation_Prod'=>$dataproduitthree->Designation_Prod,
                                            'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                                            'Quantité'=>$quantite,
                                            'Prix'=>$prix,
                                                ]);
                                            $dataproduitTow=Produit::where('Nom_Prod',$dataproduitthree->Nom_Prod)->where('Nom_Fournisseur',$dataFourniss->nom_Complet)->first();

                                            Achat::create([
                                                    'id_produit'=> $dataproduitTow->id,
                                                    'id_fournisseur'=> $fournisseurID,
                                                    'Quantite_Achat'=> $quantite,
                                                    'Prix_Achat'=> $prix*$quantite,
                                                    'validation_Achat'=> false,
                                                    'facture_imprimé'=>false
                                                    ]);
                                        }


                                    }


                            return to_route('Achat_Groupe_produit',['IdFournisseur'=> $fournisseurID])->with('success',"La vente s'est bien Ajoute dans les groupe de vente");
                        }else{


                            Achat::create([
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

            $datapro= Produit::where('Nom_Prod',$NomProduit)->first();

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
                                'Nom_Prod'=>$dataproduitthree->Nom_Prod,
                                'Designation_Prod'=>$dataproduitthree->Designation_Prod,
                                'Nom_Fournisseur'=>$dataFourniss->nom_Complet,
                                'Quantité'=>$quantite,
                                'Prix'=>$prix,
                            ]);
                        }



                    }

                        Achat::create([
                            'id_fournisseur'=>$fournisseurID,
                            'id_produit'=>$datapro->id,
                            'Quantite_Achat'=> $quantite,
                            'Prix_Achat'=> $prix*$quantite,
                            'validation_Achat'=> false,
                            'facture_imprimé'=> false,
                        ]);


                return to_route('Achat_Groupe_produit',['IdFournisseur'=> $fournisseurID])->with('success',"La vente s'est bien Ajoute dans les groupe de vente");
            }


        }


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
    {
         Achat::findOrFail($request->id_Achat)->delete();
        // dd($dataDeletVente);
       return to_route('Achat_Groupe_produit',['IdFournisseur'=>$request->id_fournisseur]);
    }
}
