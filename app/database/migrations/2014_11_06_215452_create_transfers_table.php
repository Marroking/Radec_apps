<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Crear la tabla transfers
		Schema::create('transfers', function($table){
			$table->increments('id');
			$table->string('origin', 10);
			$table->string('destionation', 10);
			$table->date('since');;
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
		//Eliminar la tabla tranfers
		Schema::drop('tranfers');
	}

}
