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
        Schema::create('permanents', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->string('cin');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('job');
            $table->date('date_acquisition_location');
            $table->text('note')->nullable();
            $table->string('statut');
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
        Schema::dropIfExists('permanents');
    }
};
