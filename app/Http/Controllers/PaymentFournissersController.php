<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Fournisseur;
use App\Models\Payment_fournissers;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf;
class PaymentFournissersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($codeFournisseur)
    {
        $dataAchat_deFournisseur=Achat::where('id_fournisseur',$codeFournisseur)->where('validation_Achat',0)->get();
        // dd($dataAchat_deFournisseur);
        return view('Pay_FournisseurPage',compact('dataAchat_deFournisseur'));
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

        $PayFournisseurt=$request->PayFourniss;
        $montant=$request->montant;
        $ToTalPay=$request->ToTalPay;
        $RestPay=$request->RestPay;
        $request->validate([
            'PayFourniss'=>['required','exists:fournisseurs,nom_Complet'],
            'montant'=>['required'],
            'ToTalPay'=>['required'],
            'RestPay'=>['required'],
        ]);
        $dataFournisseurt= Fournisseur::where('nom_Complet',$PayFournisseurt)->first();
        //   dd($dataFournisseurt->id);
        $dataPaymentClient= Payment_fournissers::where('id_Fournisseur',$dataFournisseurt->id)->first();
        //   dd($dataClient->Montant);
        Fournisseur::where('nom_Complet',$PayFournisseurt)->update([
                'Montant'=>$dataFournisseurt->Montant +$RestPay
        ]);
        if(!$dataPaymentClient){
            Achat::where('id_fournisseur',$dataFournisseurt->id)->update([
                'validation_Achat'=> true,
            ]);
            Payment_fournissers::create([
                'id_Fournisseur'=> $dataFournisseurt->id,
                'Montant_Pay'=> $ToTalPay
            ]);


        }else{
            Achat::where('id_fournisseur',$dataFournisseurt->id)->update([
                'validation_Achat'=> true,
            ]);
            Payment_fournissers::where('id_Fournisseur',$dataFournisseurt->id)->update([
                'Montant_Pay'=>$ToTalPay
            ]);
        }



        $controllerPay=new PaymentFournissersController();

        return $controllerPay->show($dataFournisseurt->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($idForuniss)
    {
        $dataFournisseur=Fournisseur::findOrFail($idForuniss);
        $dataAchat=Achat::where('id_fournisseur',$idForuniss)->where('facture_imprimé',0)->get();
        $dataPayment=Payment_fournissers::where('id_Fournisseur',$idForuniss)->first();
        $dataUser=User::findOrFail(session()->get('id_User'));

        // // $dataVente=Vente::findOrFail(12);
        // dd($dataVente,$dataPayment);
        Achat::where('id_fournisseur',$idForuniss)->update([
            'facture_imprimé'=>true,
        ]);
        $dataVenteAll=Achat::where('id_fournisseur',$idForuniss)->get();
        // dd($idForuniss,$dataAchat,$dataFournisseur,$dataPayment, $dataUser);
        // $dataClient=$dataFournisseur;
        // $dataVente=$dataAchat;
        $data = compact( 'dataFournisseur','dataAchat','dataUser','dataPayment');
        $html = view('Pdf.Pdf_Facture2', $data)->render();
            // return to_route('Pdf_facture',['idClient'=>1]);
        return SnappyPdf::loadHTML($html)->inline('Facture_'.$dataUser->Nom_Complet.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment_fournissers $payment_fournissers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment_fournissers $payment_fournissers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment_fournissers $payment_fournissers)
    {
        //
    }
}
