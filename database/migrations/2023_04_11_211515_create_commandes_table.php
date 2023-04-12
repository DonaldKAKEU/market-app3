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
            $table->date('date_livraison');
            $table->boolean('statut')->default(false);
            $table->string("prix_total");
            $table->foreignId('user_id')->constrained();
            $table->foreignId('panier_id')->constrained();
            $table->integer("quantite");
            $table->foreignId('livreurs_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
