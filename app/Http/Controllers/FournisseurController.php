<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('AjouteFounisseur');
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
        $NomComplet=$request->NomComplet;
        $email=$request->email;
        $Adresse=$request->Adresse;
        $Telephone=$request->Telephone;
        // dd($nomproduit ,$designation,$quantité,$prix);
        $dataProduit= Fournisseur::where('email',$email)->first();

        $request->validate([
            'NomComplet'=>['required','min:4'],
            'email'=>['required','min:5'],
            'Adresse'=>['required','min:3'],
            'Telephone'=>['required','min:10'],
        ]);
        if(!$dataProduit){
                Fournisseur::create([
                    'nom_Complet'=>$NomComplet,
                    'email'=>$email,
                    'Adresse'=> $Adresse,
                    'telephone'=>$Telephone,
                    'Montant'=>0,
                ]);
                return to_route('Ajoute_Fournisseur')->with('success','Le produit est Bien Ajoute ');
        }else{
            Fournisseur::where('email',$email)->update([
                'nom_Complet'=>$NomComplet,
                'email'=>$email,
                'Adresse'=> $Adresse,
                'telephone'=>$Telephone,

            ]);
            return to_route('Ajoute_Fournisseur')->with('success','Le produit est bien mise à jour');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        $dataFourni = Fournisseur::paginate(5);

        return view('All_fournisseur_page',compact('dataFourni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $dataFourni = Fournisseur::paginate(5);
      $dataFourniAll=  Fournisseur::findOrfail($request->idClient);
      if($dataFourniAll){
        $dataFourniAll->delete();
        return redirect()->route('Ajoute_Fournisseur_all',compact('dataFourni'))->with('success','Client est supprimer bien');
      }else{
        return redirect()->route('Ajoute_Fournisseur_all',compact('dataFourni'))->with('errorMessage','Error le Client est Ne pas supprimer ');
      }

    }
}
