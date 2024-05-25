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
        Schema::create('payment__clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Client');
            $table->float('Montant_Pay');
            $table->foreign('id_Client')->references('id')->on('clients')
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
        Schema::dropIfExists('payment_clients');
    }
};
