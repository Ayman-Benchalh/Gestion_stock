<!DOCTYPE html>
<html>
<head>
    <title>Facture</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.invoice {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

}

.invoice .header {
    text-align: center;
    margin-bottom: 20px;
}

.invoice .header h1 {
    font-size: 30px;
    color: #333;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.invoice .header p {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}

.invoice .details {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.invoice .details .client-details,
.invoice .details .billing-details {
    flex: 1;
}

.invoice .details h2 {
    font-size: 18px;
    color: #333;
    margin-top: 0;
}

.invoice .details p {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}

.invoice .invoice-items {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.invoice .invoice-items th,
.invoice .invoice-items td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

.invoice .total {
    text-align: right;
}

.invoice .total p {
    font-size: 18px;
    color: #333;
    margin: 10px 0;
}
.tbtb{
    display: flex;
    justify-content: space-between;
    align-items: center
}

 </style>
</head>
<body>
    <div class="invoice">
        <div class="header" >
            <table class="tbtb" style="width: 100% ; padding:50px">
                <tr>
                    <td style="text-align: start">
                        {{-- <img src="{{ asset('Image/repairing.webp') }}" alt=""> --}}
                       <h1 style="font-size: 50px">Droguerie Issam</h1>
                    <td style="text-align: end  ;">
                         <h1>Facture</h1>
                        <p>Numero de facture : Fact-1</p>
                        <p>Date de facture : {{ date('d-m-Y') }}</p></td>
                    </td>
                </tr>
            </table>

        </div>
        <div class="details">
            <table  style="width: 100%; padding:50px 0">
                <tr>
                    <td >
                        <div class="billing-details">
                        <h2>Details de la facturation</h2>
                        <p>Facturer a:  Droguerie Issam</p>
                        <p>Adresse: {{ $dataUser->email }}</p>
                        <p>Nom Complet: {{ $dataUser->Nom_Complet }}</p>
                        <p>Email: {{ $dataUser->email }}</p>
                        </div>
                    </td>
                    <td style="text-align: end">
                        <div class="client-details">
                        <h2> Details du client</h2>
                        <p>Nom du client : {{ $dataFournisseur->nom_Complet }}</p>
                        <p>Adresse du client : Hay El andalous</p>
                        <p>Email : {{ $dataFournisseur->email }}</p>
                        <p>Telephone : {{ $dataFournisseur->telephone }}</p>
                    </div>
                    </td>

                </tr>
            </table>


        </div>
        <table class="invoice-items" style="padding: 25px 0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Description</th>
                    <th>Quantite</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            @php
                    $Ht= 0;
                    $Tva = $dataPayment->Montant_Pay*20/100;
                    $TTc=$dataPayment->Montant_Pay+$Tva;
             @endphp
            <tbody>
                @foreach ($dataAchat as $key=>$itemAchat)
                    <tr>
                        <td> {{ $key+1 }}</td>
                        <td>{{ $itemAchat->produits->Nom_Prod}}</td>
                        <td>{{ $itemAchat->Quantite_Achat }}</td>
                        <td>{{ $itemAchat->produits->Prix }}</td>
                        <td>{{ $itemAchat->Prix_Achat }}</td>
                    </tr>
                    @php
                       $Ht+=$itemAchat->Prix_Achat
                    @endphp
                @endforeach


                {{-- <tr>
                    <td>N 1</td>
                    <td>{{ $dataVente->produits->Nom_Prod }}</td>
                    <td>{{ $dataVente->Quantite_vente }}</td>
                    <td>{{ $dataVente->produits->Prix }}</td>
                    <td>{{ $dataVente->Prix_Vente }}</td>
                </tr> --}}
   {{-- {{ dd($dataVente->produits ) }} --}}


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: end ;padding:10px;">Total HT: </td>
                    <td> {{  $Ht }} DH</td>
                </tr>

                <tr>
                    <td colspan="4" style="text-align: end; padding:0 15px;">Total de paiement  : </td>
                    <td> {{ $dataPayment->Montant_Pay }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: end; padding:0 15px;">Montant de la TVA : </td>
                    <td> 20 %</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: end; padding:0 15px;">TVA : </td>
                    <td>{{ $Tva  }}  </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: end; padding:0 15px;"> Total TTC : </td>
                    <td style="font-size: 25px;font-weight: 600;">{{  $TTc }}  DH</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: end; padding:0 15px;"> Montant de paiement restant : </td>
                    <td style="font-size: 10px;">{{ $dataPayment->fournisseurs->Montant }} DH</td>
                </tr>
            </tfoot>
        </table>
        <p>
            Les conditions de paiement sont simples : paiement comptant... au ,2024
        </p>
        {{-- <div class="invoice-items" style="with:100%; background-color:rgba(0, 255, 255, 0); display:flex; justify-content: center; align-items: center;">
            <table style="width: 40% ; background-color: #bd3a3a00 ; margin :auto;" >
                <tr  >

                    <td  style="text-align: center"> </td>
                    <td> </td>
                </tr>
                <tr>

                    <td  style="text-align: center"> </td>
                    <td></td>
                </tr>
                <tr>

                    <td  style="text-align: center"></td>
                    <td>  1750  DH</td>
                </tr>
            </table>
            {{-- <p> </p>
            <p> </p>
            <p>prix total : $175</p>
        </div>--}}
        <table style="width: 100%;  padding:15px;">
            <tr>
                <td style="text-align: start;height: 50px;"> Signature:</td>

            </tr>
            <tr >
                <td style="text-align: start; height: 50px;">dans :</td>

            </tr>
        </table>
    </div>
</body>
</html>
