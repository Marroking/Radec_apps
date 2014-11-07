<?php
/**
  * Aregar un usuario a la base de datos
 **/
class UserTableSeeder extends Seeder {
	public function run(){
		User::create(array(
			'id_collaborator' => 778,
			'role_id' => 1,
			'full_name' => 'Miguel Marroquín Estrada',
			'username' => 'marroking',
			'email' => 'miguel_marroquin@radec.com.mx',
			'password' => Hash::make('Mkn!')
		));

		User::create(array(
			'id_collaborator' => 768,
			'role_id' => 2,
			'full_name' => 'Juan Pérez Sánchez',
			'username' => 'juancho',
			'email' => 'juancho@radec.com.mx',
			'password' => Hash::make('Mkn!')
		));
	}
}