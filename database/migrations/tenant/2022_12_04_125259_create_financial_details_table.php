<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_account_number');
            $table->string('branch_name');
            $table->string('bank_account_name');
            $table->string('momo_number');
            $table->string('momo_account_type');
            $table->string('momo_account_name');
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
        Schema::drop('financial_details');
    }
}
