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
        Schema::create('cars', function (Blueprint $table) {
            $table->id('voiture_id');
            $table->string('nom_voiture');
            $table->string('boite');
            $table->string('puissance');
            $table->decimal('tarif', 12, 2);
            $table->decimal('frais_livraison', 12, 2);
            $table->integer('place');
            $table->integer('coffre');
            $table->integer('porte');
            $table->string('clim');
            $table->string('radio');
            $table->string('gps');
            $table->string('rehausseur');
            $table->string('bebe');
            $table->string('traction');
            $table->string('decapotable');
            $table->string('utilitaire');
            $table->string('dispo');
            $table->string('lieu_dispo');
            $table->string('motorisation');
            $table->string('symbole');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
