<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->integer('region_id');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->string('town');
            $table->string('community');
            $table->string('street');
            $table->string('house_number');
            $table->string('postal_code');
            $table->boolean('is_primary');
            $table->integer('owner');
            $table->string('owner_type');
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
        Schema::drop('addresses');
    }
}
