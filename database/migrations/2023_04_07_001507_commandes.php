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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('statut_commande');
            $table->boolean("statut_livraison");
           // $table->foreignId('clients_id')->references("id")->on("clients");
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('produits_id')->references("id")->on("produits");
            $table->foreignId('produits_id')->constrained()->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes2');
    }
};
