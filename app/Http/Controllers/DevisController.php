<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Produit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DevisController extends Controller
{
    public function index(){
        $dataDevis=Devis::all();
        return view('Devis_all_produit_page',compact('dataDevis'));
    }
    public function Ajoute_produit_to_groupe_devis(Request $request){
        $dataProduit = Produit::all();
        return view('Add_one_to_devis_groupe_page',compact('dataProduit'));
        // return 'this is page Ajoute produit to groupe devis';
    }
    public function store(Request $request,Produit $produit){
        $request->validate([
            'selectproduit'=>['required','exists:produits,id'],
            'quantite'=>['required'],
            'prix'=>['required'],
        ]);
        $dataOnePruidt =$produit->find($request->selectproduit);
        $data_devis=Devis::where('Description',$dataOnePruidt->Nom_Prod)->first();
        // dd($data_devis);
        if($data_devis){

            Devis::where('Description',$dataOnePruidt->Nom_Prod)->update([
                'Prix_unitaire_HT'=>$dataOnePruidt->Prix,
                'Quantite'=>$request->quantite,
                'Unitaire_HT'=>$dataOnePruidt->Prix*$request->quantite
            ]);
        }else{
            Devis::create([
            'Description'=>$dataOnePruidt->Nom_Prod,
            'Prix_unitaire_HT'=>$dataOnePruidt->Prix,
            'Quantite'=>$request->quantite,
            'Unitaire_HT'=>$dataOnePruidt->Prix*$request->quantite
            ]);
        }

            $dataDevis=Devis::all();
            // dd($produit->find($request->selectproduit));
        return to_route('Devis.page',compact('dataDevis'))->with('success','Produit est bien Ajoute au devis Groupe');
    }
    public function ImprimePdf(Request $request){
        $data = [
            'entreprise' => [
                'nom' => 'Nom de l\'entreprise',
                'adresse' => 'Adresse',
                'ville_code_postal' => 'Ville et Code Postal',
                'telephone' => 'Numéro de téléphone',
                'email' => 'Email',
            ],

            'devis' => [
                'numero' => '001',
                'date' => '10/06/2024',
                'items' => [
                    ['description' => 'Création de site internet', 'prix' => 1500, 'unite' => '1', 'quantite' => 1, 'montant' => 1500],
                    ['description' => 'Création de logo', 'prix' => 150, 'unite' => '1', 'quantite' => 1, 'montant' => 150],
                    ['description' => 'Maintenance site internet mensuelle', 'prix' => 50, 'unite' => 'heures', 'quantite' => 12, 'montant' => 600],
                ],
                'total_ht' => 2250,
                'tva' => 450,
                'total_ttc' => 2700,
                'validite' => '30/06/2024',
                'conditions' => 'Modalités et conditions de règlement',
            ],
        ];
        $data_devis =Devis::all();
        $pdf = PDF::loadView('Pdf.Devis_pdf', $data);
        return $pdf->stream('devis.pdf');
        // return 'this is page Imprime Pdf';
    }
    public function ImprimeTickt(Request $request){
        return 'this is page Imprime tickt';
    }
    public function distroy(Request $reques ,Devis $devis){
        $dataDevis=Devis::all();

        $data_devis= $devis->find($reques->id_devis);
        if($data_devis){
            $data_devis->delete();
            return redirect()->route('Devis.page',compact('dataDevis'))->with('success','Le produit a bien été supprimé du groupe de devis.');
        }else{
            return redirect()->route('Devis.page',compact('dataDevis'))->with('errorMessage','Un problème de suppression du produit dans le groupe de devis.');
        }

    }
    public function distroy2(Request $reques ,Devis $devis){
        $dataDevis=Devis::all();

        if($dataDevis){
            Devis::query()->delete();
            return redirect()->route('Devis.page',compact('dataDevis'))->with('success','tous les produit est bien supprime dans le groupe de devis');
        }else{
            return redirect()->route('Devis.page',compact('dataDevis'))->with('errorMessage','le groupe de devis est deja vide ');

        }


    }
}
