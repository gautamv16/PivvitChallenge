<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOffering extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerring', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 500);
			$table->float('price');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offerring');
    }
}
