<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//definiranje stranog kljuca i kaskadnog brisanja 
                                                                             //u slucaju brisanja korisnika
            $table->string('property_title',50);
            $table->integer('check_in')->nullable();
            $table->integer('check_out')->unsigned();
            $table->integer('number_of_bedrooms')->unsigned();
             $table->integer('house_size')->unsigned();
            $table->integer('number_of_bathrooms')->unsigned();
            $table->integer('number_of_people')->unsigned();
            $table->integer('bed_for_one_number')->unsigned();
            $table->integer('bed_for_two_number')->unsigned();
            $table->integer('children_bed_number')->unsigned();
            $table->double('deposit')->unsigned();
            $table->text('property_description');
            $table->string('apartment_city',50);
            $table->integer('apartment_zip')->unsigned();
            $table->string('apartment_address',50);
            $table->string('apartment_province',50);
            $table->boolean('internet')->nullable();
            $table->boolean('wireless')->nullable();
            $table->boolean('cable_tv')->nullable();
            $table->boolean('kitchen')->nullable();
            $table->boolean('bed_linen')->nullable();
            $table->boolean('gym')->nullable();
            $table->boolean('elevator')->nullable();
            $table->boolean('balcony')->nullable();
            $table->boolean('smoking')->nullable();
            $table->boolean('pets')->nullable();
            $table->boolean('towels')->nullable();
            $table->boolean('parking')->nullable();
            $table->boolean('air_conditioning')->nullable();
            $table->boolean('washing_machine')->nullable();
            $table->boolean('wheel_chair')->nullable();
            $table->boolean('pool')->nullable();
            $table->double('price_per_night')->unsigned();
            $table->double('weekly_price')->unsigned();
            $table->double('monthly_price')->unsigned();
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
        Schema::drop('apartments');
    }
}
