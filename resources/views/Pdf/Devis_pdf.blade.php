<!DOCTYPE html>
<html>
<head>
    <title>Devis</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid rgb(0, 0, 0) ;}
        table th {background-color: crimson;
        color: #fff}
        th, td { padding: 8px; text-align: left; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .bold { font-weight: bold; }

    </style>
</head>
<body>
    <div>
        <h1 class="text-center">Devis N° {{ $devis['numero'] }}</h1>
        <p class="text-right">Ville, le {{ $devis['date'] }}</p>

                    <h3>Nom de l'entreprise</h3>
                        <p>
                            {{ $entreprise['nom'] }}<br>
                            {{ $entreprise['adresse'] }}<br>
                            {{ $entreprise['ville_code_postal'] }}<br>
                            Téléphone: {{ $entreprise['telephone'] }}<br>
                            Email: {{ $entreprise['email'] }}
                        </p>





        <table >
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Prix unitaire HT</th>
                    <th>Unité</th>
                    <th>Quantité</th>
                    <th>Montant HT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devis['items'] as $item)
                    <tr>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['prix'] }} €</td>
                        <td>{{ $item['unite'] }}</td>
                        <td>{{ $item['quantite'] }}</td>
                        <td>{{ $item['montant'] }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="text-right bold">Total HT: {{ $devis['total_ht'] }} €</p>
        <p class="text-right bold">TVA 20%: {{ $devis['tva'] }} €</p>
        <p class="text-right bold">Total TTC: {{ $devis['total_ttc'] }} €</p>

        <p>Modalités et conditions de règlement: {{ $devis['conditions'] }}</p>
        <p>Offre valable jusqu'au: {{ $devis['validite'] }}</p>

        <p class="text-right">Signature:</p>

        <p>Mon entreprise – Société ... au capital de ... euros</p>
        <p>N° Siret:</p>
    </div>
</body>
</html>
