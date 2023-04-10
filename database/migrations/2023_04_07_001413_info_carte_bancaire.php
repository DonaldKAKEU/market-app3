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
        Schema::create('info_carte_bancaires', function (Blueprint $table) {
            $table->id();
            $table->integer("numero");
            $table->integer("password");
            $table->integer("soldeCompte");
            $table->timestamps();
            //$table->integer("client_id");
           // $table->foreignId("clients_id")->references("id")->on("clients");
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_carte_bancaires');
    }
};
