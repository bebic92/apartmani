<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->date('date_of_birth');
            $table->string('email')->unique();// lozinka treba biti jedinstvena
            $table->string('password');
            $table->string('birth_country',50);
            $table->string('birth_city',50);
            $table->string('user_address',50);
            $table->string('user_phone',50);
            $table->enum('gender',['','male','female']);// enum- samo musko ili zensko(male,female)
            $table->text('description');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
