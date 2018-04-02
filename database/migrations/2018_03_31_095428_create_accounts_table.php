<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','100');
            $table->string('phone','13');
            $table->string('email','255');
            $table->string('province','15');
            $table->string('city','15');
            $table->string('district','15');
            $table->string('address','255');
            $table->string('description','255');
            $table->string('avatar',255)->default('no-foto.png');
            $table->boolean('active');
        
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
        Schema::dropIfExists('accounts');
    }
}
