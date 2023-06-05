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
        Schema::create('bon_receptions', function (Blueprint $table) {
            $table->id();
            $table->date('BR_Date')->nullable();
            $table->unsignedBigInteger('BR_Client')->nullable();
            $table->unsignedInteger('BR_Qte')->nullable();
            $table->unsignedBigInteger('BR_Transporte')->nullable();
            $table->string('BR_Note')->nullable();
            $table->unsignedInteger('BR_NoDocument')->nullable();
            $table->timestamps();
            $table->foreign('BR_Client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('BR_Transporte')->references('id')->on('transports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_receptions');
    }
};
