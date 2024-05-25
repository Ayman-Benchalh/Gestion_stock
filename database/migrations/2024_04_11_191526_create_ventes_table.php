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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_produit');
            $table->integer('Quantite_vente');
            $table->integer('Prix_Vente');
            $table->boolean('validation_Vente');
            $table->boolean('facture_imprimé');
            $table->foreign('id_client')->references('id')->on('clients')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_produit')->references('id')->on('produits')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
