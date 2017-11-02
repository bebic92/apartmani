<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->unsigned();
             //definiranje stranog kljuca i kaskadnog brisanja slika u slucaju brisanja oglasa
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
             //definiranje stranog kljuca
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('comment');
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
        Schema::drop('comments');
    }
}
