<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->string('type_vehicule')->nullable();
            $table->string('marque');
            $table->string('model');
            $table->string('carburant')->nullable();
            $table->string('consomation_moyen')->nullable();
            $table->integer('puissance_fiscale')->nullable();
            $table->date('date_1ere_immat')->nullable();
            $table->string('propriete');
            $table->date('date_acquisition_location')->nullable();
            $table->string('kilometrage')->nullable();
            $table->string('km_effectues_depuis_debut_annee')->nullable();
            $table->date('date_dernier_controle_technique')->nullable();
            $table->string('cadence_vidange')->nullable();
            $table->string('km_derniere_vidange')->nullable();
            $table->string('cadence_courroie')->nullable();
            $table->string('km_derniere_courroie')->nullable();
            $table->text('remarque_sur_etat_generale')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
