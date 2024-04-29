<?php

namespace Database\Seeders;

use App\Models\Fournisseur;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fournisseur::create([
        //     'nom_Complet'=>Str::random(10),
        //     'Adresse'=>Str::random(10),
        //     'email'=>Str::random(10).'@example.com',
        //     'telephone'=>Str::random(10),
        //     'Montant'=>0,
        // ]);
        Fournisseur::factory()->count(5)->create();
    }
}
