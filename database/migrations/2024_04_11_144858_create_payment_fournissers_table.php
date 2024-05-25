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
        Schema::create('payment_fournissers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Fournisseur');
            $table->float('Montant_Pay');
            $table->foreign('id_Fournisseur')->references('id')->on('fournisseurs')
            ->onUpdate('cascade')
            ->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_fournissers');
    }
};
