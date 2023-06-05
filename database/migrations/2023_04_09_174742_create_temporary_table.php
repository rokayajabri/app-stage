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
        Schema::create('temporary_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->unsignedBigInteger('detail_br_id')->nullable();
            $table->date('BR_Date')->nullable();
            $table->unsignedBigInteger('BR_Client')->nullable();
            $table->unsignedInteger('BR_Qte')->nullable();
            $table->unsignedBigInteger('BR_Transporte')->nullable();
            $table->text('BR_Note')->nullable();
            $table->unsignedInteger('BR_NoDocument')->nullable();

            $table->unsignedBigInteger('dBR_BR')->nullable();
            $table->unsignedBigInteger('dBR_Produit')->nullable();
            $table->string('dBR_SN')->nullable();
            $table->unsignedBigInteger('dBR_Etat_Reparation')->nullable();
            $table->string('dBR_Garantie')->nullable();
            $table->string('dBR_Accessoires')->nullable();
            $table->unsignedBigInteger('dBR_Technicien')->nullable();
            $table->string('dBR_Note')->nullable();
            $table->timestamps();

            $table->foreign('BR_Client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('BR_Transporte')->references('id')->on('transports')->onDelete('cascade');
            $table->foreign('br_id')->references('id')->on('bon_receptions')->onDelete('cascade');
            $table->foreign('detail_br_id')->references('id')->on('detail__brs')->onDelete('cascade');
            $table->foreign('dBR_BR')->references('id')->on('bon_receptions')->onDelete('cascade');
            $table->foreign('dBR_Produit')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('dBR_Etat_Reparation')->references('id')->on('produit__etat__reparations')->onDelete('cascade');
            $table->foreign('dBR_Technicien')->references('id')->on('techniciens')->onDelete('cascade');
        },'temporary');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_table');
    }
};
