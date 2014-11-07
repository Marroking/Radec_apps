<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Crear la tabla users
		Schema::create('users', function($table){
			$table->increments('id');
			$table->integer('id_collaborator')->unique;
			$table->string('full_name', 100);
			$table->string('username', 100)->unique;
			$table->string('email', 100)->unique;
			$table->string('password');
			$table->string('remember_token')->nullable();
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
		//Eliminar la tabla users
		Schema::drop('users');
	}

}
