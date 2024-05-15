<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment_Client;
use App\Models\Vente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Jobs\GeneratePdf;

use App\Jobs\ProcessPodcast;
use Illuminate\Support\Facades\Queue;


use App\Services\AudioProcessor;
use Illuminate\Contracts\Foundation\Application;


use App\Models\Record;
use App\Models\User;
use Nette\Schema\Context;

class PaymentClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($codeClient)
    {
        $dataVente_deClient=Vente::where('id_client',$codeClient)->where('validation_Vente',0)->get();
        // dd($dataVente_deClient);
       return view('Pay_ClientPage',compact('dataVente_deClient'));
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
            $PayClient=$request->PayClient;
            $montant=$request->montant;
            $ToTalPay=$request->ToTalPay;
            $RestPay=$request->RestPay;
            $request->validate([
                'PayClient'=>['required','exists:clients,nom_Complet'],
                'montant'=>['required'],
                'ToTalPay'=>['required'],
                'RestPay'=>['required'],
            ]);
            $dataClient= Client::where('nom_Complet',$PayClient)->first();
            //   dd($ddsr->id);
            $dataPaymentClient= Payment_Client::where('id_Client',$dataClient->id)->first();
            //   dd($dataClient->Montant);
            Client::where('nom_Complet',$PayClient)->update([
                    'Montant'=>$dataClient->Montant +$RestPay
            ]);
            if(!$dataPaymentClient){
                Vente::where('id_client',$dataClient->id)->update([
                    'validation_Vente'=> true,
                ]);
                Payment_Client::create([
                    'id_Client'=> $dataClient->id,
                    'Montant_Pay'=> $ToTalPay
                ]);


            }else{
                Vente::where('id_client',$dataClient->id)->update([
                    'validation_Vente'=> true,
                ]);
                Payment_Client::where('id_Client',$dataClient->id)->update([
                    'Montant_Pay'=>$ToTalPay
                ]);
            }



            $controllerPay=new PaymentClientController();

            return $controllerPay->show($dataClient->id);


    }

    /**
     * Display the specified resource.
     */
    public  function show($idClient)
    {
        $dataClient=Client::findOrFail($idClient);
        $dataVente=Vente::where('id_client',$idClient)->where('facture_imprimé',0)->get();
        $dataPayment=Payment_Client::where('id_client',$idClient)->first();
        $dataUser=User::findOrFail(session()->get('id_User'));

        // // $dataVente=Vente::findOrFail(12);
        // dd($dataVente,$dataPayment);
        vente::where('id_client',$idClient)->update([
            'facture_imprimé'=>true,
        ]);
        $dataVenteAll=Vente::where('id_client',$idClient)->get();
        // dd($dataVenteAll);
        $data = compact( 'dataClient','dataVente','dataUser','dataPayment');
        $html = view('Pdf.Pdf_Facture', $data)->render();
            // return to_route('Pdf_facture',['idClient'=>1]);
        return SnappyPdf::loadHTML($html)->inline('Facture_'.$dataUser->Nom_Complet.'.pdf');




    }
    public function  paiement_Cred_Client(){
        $dataClient=Client::all();
        return view('Pay_Credi_Client',compact('dataClient'));
    }
    public function  paiement_Cred_Client_ps(Request $request){
        $selectClientId=$request->selectClient;
        $MontantCredi=$request->MontantCredi;
        $prixPay=$request->prixPay;
        $restPay=$request->restPay;

        request()->validate([
            'selectClient'=>['required','exists:clients,id'],
            'MontantCredi'=>['required','exists:clients,Montant'],
            'prixPay'=>['required',],
            'restPay'=>['required'],
        ]);
        $dataClient=Client::where('id',$selectClientId)->where('Montant','>',0)->get()->ToArray();

        if($dataClient){
            // dd($dataClient);
            $dataPay=Payment_Client::where('id_Client',$selectClientId)->first();


            if(!$dataPay){
                Payment_Client::create([
                        'id_Client'=>$selectClientId,
                        'Montant_Pay'=>$prixPay
                    ]);
            }else{
                Payment_Client::where('id_Client',$selectClientId)->update([
                'Montant_Pay'=>$prixPay
            ]);
            }

            Client::findOrfail($selectClientId)->update([
                'Montant'=>$restPay,
            ]);
            // return redirect()->route('Pay_Cre_client')->with('success','payment has bin successfule');
            $controllerPay=new PaymentClientController();

            return $controllerPay->show2($selectClientId);

        }else{
            return redirect()->route('Pay_Cre_client')->with('errorMessage','vous nave pas aucen credi');
        }


        // $dataClient=Client::all();
        // return view('Pay_Credi_Client',compact('dataClient'));
    }

    public  function show2($idClient)
    {
        $dataClient=Client::findOrFail($idClient);
        $dataVente=Vente::where('id_client',$idClient)->where('facture_imprimé',0)->get();
        $dataPayment=Payment_Client::where('id_client',$idClient)->first();
        $dataUser=User::findOrFail(session()->get('id_User'));

        // // $dataVente=Vente::findOrFail(12);
        // dd($dataVente,$dataPayment);
        // vente::where('id_client',$idClient)->update([
        //     'facture_imprimé'=>true,
        // ]);
        // $dataVenteAll=Vente::where('id_client',$idClient)->get();
        // dd($dataVenteAll);
        $data = compact( 'dataClient','dataVente','dataUser','dataPayment');
        $html = view('Pdf.Pdf_Facture3', $data)->render();
            // return to_route('Pdf_facture',['idClient'=>1]);
        return SnappyPdf::loadHTML($html)->inline('Facture_'.$dataClient->nom_Complet.'.pdf');




    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment_Client $payment_Client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment_Client $payment_Client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment_Client $payment_Client)
    {
        //
    }
}
