<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('AjouteClient');
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
        $dataProduit= Client::where('email',$email)->first();

        $request->validate([
            'NomComplet'=>['required','min:4'],
            'email'=>['required','min:5'],
            'Adresse'=>['required','min:3'],
            'Telephone'=>['required','min:10'],
        ]);
        if(!$dataProduit){
               Client::create([
                    'nom_Complet'=>$NomComplet,
                    'email'=>$email,
                    'Adresse'=> $Adresse,
                    'telephone'=>$Telephone,
                    'Montant'=>0,
                ]);
                return to_route('Ajoute_Client')->with('success','Client est Bien Ajoute ');
        }else{
                Client::where('email',$email)->update([
                'nom_Complet'=>$NomComplet,
                'email'=>$email,
                'Adresse'=> $Adresse,
                'telephone'=>$Telephone,

            ]);
            return to_route('Ajoute_Client')->with('success',' Client est bien mise à jour');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $dataClient = Client::paginate(5);

        return view('All_client_page',compact('dataClient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $dataClient = Client::paginate(5);
      $dataClientAll=  Client::findOrfail($request->idClient);
      if($dataClientAll){
        dd('Client is deleted',  $dataClientAll);
        // $dataClientAll->delete();
        return redirect()->route('Ajoute_Client_all',compact('dataClient'))->with('success','Client est supprimer bien');
      }else{
        return redirect()->route('Ajoute_Client_all',compact('dataClient'))->with('errorMessage','Error le Client est Ne pas supprimer ');
      }

    }
}
