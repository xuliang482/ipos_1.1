<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('gender', 1);
            $table->string('email', 30);
            $table->string('phone_number', 20);
            $table->string('avatar', 255)->default('no-foto.png');
            $table->string('address', 255)->nullable($value = true);
            $table->string('province','15')->nullable($value = true);
            $table->string('city','15')->nullable($value = true);
            $table->string('district','15')->nullable($value = true);
            $table->string('zip', 10)->nullable($value = true);
            $table->string('comment', 255)->nullable($value = true);
            $table->string('company_name', 100)->nullable($value = true);
            $table->string('account', 20)->nullable($value = true);
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
        Schema::dropIfExists('customers');
    }
}
