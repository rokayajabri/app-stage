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
        Schema::create('produit__photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Ph_Pr')->nullable();
            $table->string('Ph_Nom')->nullable();
            $table->string('Ph_image')->nullable();
            $table->timestamps();
            $table->foreign('Ph_Pr')->references('id')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit__photos');
    }
};
