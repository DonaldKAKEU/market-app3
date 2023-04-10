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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->integer("numero_produit")->unique();
            $table->string("libelle");
            $table->double("prix");
            $table->string("description");
            $table->integer("taille");
            $table->integer("poid");
            $table->timestamps();
            //$table->foreignId('vendeurs_id')->references("id")->on("vendeurs");
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('paniers_id')->references("id")->on("paniers");
            //$table->foreignId('panier_id')->constrained()->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
