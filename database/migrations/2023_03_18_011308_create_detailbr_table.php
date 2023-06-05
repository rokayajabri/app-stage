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
        Schema::create('detail__brs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dBR_BR')->nullable();
            $table->unsignedBigInteger('dBR_Produit')->nullable();
            $table->string('dBR_SN')->nullable();
            $table->string('dBR_Problem')->nullable();
            $table->unsignedBigInteger('dBR_Etat_Reparation')->nullable();
            $table->string('dBR_Garantie')->nullable();
            $table->string('dBR_RepairDetail')->nullable();
            $table->string('dBR_Accessoires')->nullable();
            $table->unsignedBigInteger('dBR_Technicien')->nullable();
            $table->string('dBR_Photo')->nullable();
            $table->string('dBR_Note')->nullable();
            $table->timestamps();
            $table->foreign('dBR_BR')->references('id')->on('bon_receptions')->onDelete('cascade');
            $table->foreign('dBR_Produit')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('dBR_Etat_Reparation')->references('id')->on('produit__etat__reparations')->onDelete('cascade');            $table->foreign('dBR_Technicien')->references('id')->on('techniciens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__brs');
    }
};
