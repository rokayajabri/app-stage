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
        Schema::create('produit__etat__reparations', function (Blueprint $table) {
            $table->id();
            $table->string('EtatReparation_Ref')->default('en cours');
            $table->string('EtatReparation_Description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit__etat__reparations');
    }
};

