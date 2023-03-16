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
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->date('date_reparation');
            $table->string('affectaion');
            $table->string('designation');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->double('totale_HT');
            $table->double('totale_TTC');
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
        Schema::dropIfExists('reparations');
    }
};
