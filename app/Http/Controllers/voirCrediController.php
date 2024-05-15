<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Payment_Client;
use App\Models\Payment_fournissers;
use Illuminate\Http\Request;

class voirCrediController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($clientOrFrouni=null)
    {
        $selectDataClient= Client::where('Montant','>',1)->paginate(5);
        $selectDataFourni=Fournisseur::where('Montant','>',1)->paginate(5);
        // dd($selectDataClient,$selectDataFourni);
        $clientOrFrounistring='';
        if($clientOrFrouni=='client'){
            $clientOrFrounistring='client';
            $dataPrint=$selectDataClient;
        }elseif($clientOrFrouni=='fournisseur'){
            $clientOrFrounistring='fournisseur';
            $dataPrint=$selectDataFourni;
        }else{
            $clientOrFrouni='';
            $dataPrint=[];
        }
        // dd($dataPrint);
         return view('VoirCredi',compact('dataPrint','clientOrFrounistring'));
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

        $Nom_complet=$request->Nom_complet;
        $MontantCredi=$request->MontantCredi;
        $prixPay=$request->prixPay;
        $restPay=$request->restPay;

        if($request->typeConte == 'client'){
                $request->validate([
                'Nom_complet'=>['required','exists:clients,nom_Complet'],
                'MontantCredi'=>['required','exists:clients,Montant'],
                'prixPay'=>['required'],
                'restPay'=>['required'],
            ]);
            $dataClient=Client::where('nom_Complet',$Nom_complet)->where('Montant','>',0)->first();
            $clientOrFrouni='client';
            $idClientOrFourni=$dataClient->id;
            if($dataClient){

                $dataPay=Payment_Client::where('id_Client', $dataClient->id)->first();


                        if(!$dataPay){
                            Payment_Client::create([
                                    'id_Client'=>$dataClient->id,
                                    'Montant_Pay'=>$prixPay
                                ]);
                        }else{
                            Payment_Client::where('id_Client',$dataClient->id)->update([
                            'Montant_Pay'=>$prixPay
                        ]);
                        }

                        Client::findOrfail($dataClient->id)->update([
                            'Montant'=>$restPay,
                        ]);
                        // return redirect()->route('Pay_Cre_client')->with('success','payment has bin successfule');
                        $controllerPay=new PaymentClientController();

                        return $controllerPay->show2($dataClient->id);

                }else{
                    return redirect()->route('Gere_Credi',compact('clientOrFrouni','idClientOrFourni'))->with('errorMessage','vous nave pas aucen credi');
                }

        }elseif($request->typeConte == 'fournisseur'){
            request()->validate([
                'Nom_complet'=>['required','exists:fournisseurs,nom_Complet'],
                'MontantCredi'=>['required','exists:fournisseurs,Montant'],
                'prixPay'=>['required'],
                'restPay'=>['required'],
            ]);
            $dataFourni=Fournisseur::where('nom_Complet',$Nom_complet)->where('Montant','>',0)->first();
            // dd($dataFourni->id);
            $clientOrFrouni='fournisseur';
            $idClientOrFourni=$dataFourni->id;
            if($dataFourni){
                // dd($dataFourni);
                $dataPay=Payment_fournissers::where('id_Fournisseur',$dataFourni->id)->first();


                if(!$dataPay){
                        Payment_fournissers::create([
                            'id_Fournisseur'=>$dataFourni->id,
                            'Montant_Pay'=>$prixPay
                        ]);
                }else{
                    Payment_fournissers::where('id_Fournisseur',$dataFourni->id)->update([
                    'Montant_Pay'=>$prixPay
                ]);
                }

                Fournisseur::findOrfail($dataFourni->id)->update([
                    'Montant'=>$restPay,
                ]);
                // return redirect()->route('Pay_Cre_fourni')->with('success',"payment has bin successfule ");
                $controllerPay=new PaymentFournissersController();

                return $controllerPay->show2($dataFourni->id);
            }else{
                return redirect()->route('Gere_Credi',compact('clientOrFrouni','idClientOrFourni'))->with('errorMessage'," Tu n'as pas aucun Credi ");
            }


        }

    }

    /**
     * Display the specified resource.
     */
    public function show($clientOrFrouni,$idClientOrFourni)
    {

        if($clientOrFrouni=='client'){
            $dataClient = Client::findOrfail($idClientOrFourni);
            $data=$dataClient ;
            // dd($data);
            // return view('GereCredi',compact('data'));
        }elseif($clientOrFrouni=='fournisseur'){
            $dataFourni = Fournisseur::findOrfail($idClientOrFourni);
            $data = $dataFourni;
            // dd($data);
        }
        $typeConte=$clientOrFrouni;

        return view('GereCredi',compact('data','typeConte'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$clientOrFrouni)
    {
        $idClientOrFourni=$request->idClientOrFourni;
        if($clientOrFrouni=='client'){
            Client::findOrfail($idClientOrFourni)->delete();

        }elseif($clientOrFrouni=='fournisseur'){
            Fournisseur::findOrfail($idClientOrFourni)->delete();
        }
        return redirect()->route('Voir_Credi',compact('clientOrFrouni'))->with('success',"Le {$clientOrFrouni} est bien supprimé.");
    //  dd($request->idClientOrFourni,$clientOrFrouni);
    }
}
