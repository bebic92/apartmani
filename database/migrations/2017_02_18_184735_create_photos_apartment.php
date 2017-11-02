<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosApartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_apartment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->unsigned();
            //definiranje stranog kljuca i kaskadnog brisanja slika u slucaju brisanja oglasa
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            $table->string('photo_name');
            $table->string('photo_path');
            $table->string('thumbnail_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos_apartment');
    }
}
