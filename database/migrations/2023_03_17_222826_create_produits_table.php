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
            $table->string('Produit_Ref')->nullable();
            $table->unsignedBigInteger('Produit_Cath')->nullable();
            $table->string('Produit_Description')->nullable();
            $table->timestamps();
            $table->foreign('Produit_Cath')->references('id')->on('cathegories')->onDelete('cascade');
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
