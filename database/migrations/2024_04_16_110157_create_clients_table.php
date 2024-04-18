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
            $table->id('client_id');
            $table->foreignId('voiture_id')->constrained('cars', 'voiture_id')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('email', 100);
            $table->string('numero')->nullable();
            $table->string('payement');
            $table->string('devise');
            $table->string('num_vol_d')->nullable();
            $table->string('num_vol_r')->nullable();
            $table->string('hotel')->nullable();
            $table->string('assurance');
            $table->string('boite');
            $table->string('gps')->nullable();
            $table->string('rehausseur');
            $table->string('bebe');
            $table->datetime('date_depart');
            $table->datetime('date_retour');
            $table->string('lieu_depart');
            $table->string('lieu_depart_detaille')->nullable();
            $table->string('lieu_retour');
            $table->string('lieu_retour_detaille')->nullable();
            $table->timestamps();
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
