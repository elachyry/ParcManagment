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
        Schema::create('vidanges', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->date('date_vidange');
            $table->string('affectaion');
            $table->integer('kilomitrage')->nullable();
            $table->integer('kilomitrage_next_vidange')->nullable();
            $table->string('type_huile');
            $table->double('quantity_huile');
            $table->double('liter_price');
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
        Schema::dropIfExists('vidanges');
    }
};
