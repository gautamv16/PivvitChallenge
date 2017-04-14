<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('purchase', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('customerName', 500);
			$table->integer('offeringID');
			$table->integer('quantity');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::drop('purchase');
    }
}
