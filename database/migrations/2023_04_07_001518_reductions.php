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
        Schema::create('Reductions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("date_debut");
            $table->date("date_fin");
            $table->integer("pourcentage_reduction");
            $table->boolean("livraison_gratuite");
            $table->foreignId('user_id')->constrained();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Reductions');
    }
};
