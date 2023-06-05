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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('Client_Principale')->nullable();
            $table->string('Client_Societe')->nullable();
            $table->unsignedBigInteger('Client_Ville')->nullable();
            $table->string('Client_Tel')->nullable();
            $table->string('Client_Emails')->unique()->nullable();
            $table->string('Client_Note')->nullable();
            $table->timestamps();
            $table->foreign('Client_Ville')->references('id')->on('villes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
