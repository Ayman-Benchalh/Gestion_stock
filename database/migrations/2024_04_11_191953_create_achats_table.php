<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fournisseur');
            $table->unsignedBigInteger('id_produit');
            $table->integer('Quantite_Achat');
            $table->integer('Prix_Achat');
            $table->boolean('validation_Achat');
            $table->boolean('facture_imprimé');
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs');
            $table->foreign('id_produit')->references('id')->on('produits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
