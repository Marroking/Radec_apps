<?php

class UsersController extends BaseController{
	
	public function index(){
	// Mostar el listado de los registros de lo usuarios
		// A través de GET

			// Intanciar todos los usuarios en la variable $users
		$users = User::all();
			// Mandar la Variable $users a la vista Index
		return View::make('users.index')->with('users', $users);
	}

	public function show($id){
	// Recuperar los datos de un registro en particular
		// Necesita de un parámetro para encontrar el registro en específico
			// A través de GET

			// Obtener el usuario del Id que se especifique
		$user = User::find($id);
			// Mandar la variable $user a la vista Show
   		return View::make('users.show')->with('user', $user);
	}

	public function create(){
	// Muestra el formulario para insertar un nuevo registro
		// A través de GET

			// Instanciar el modelo User para hacer una inserción. 
		$user = new User();
			// Mandar la variable $user a la vista Create
		return View::make('users.save')->with('user', $user);
	}

	public function store(){
	// Inserta el registro recibido por del formulario 
		// A través de POST

			// Almacenar los datos recibidos por la función Create
			$user = new User();
			$user->id_collaborator = Input::get('id_collaborator');
	    $user->full_name = Input::get('full_name');
	    $user->username = Input::get('username');
	    $user->email = Input::get('email');
	    $user->password = Hash::make(Input::get('password'));
	    $validator = User::validate(array(
	    	'id_collaborator' => Input::get('id_collaborator'),
	      'full_name' => Input::get('full_name'),
	      'username' => Input::get('username'),
	      'email' => Input::get('email'),
	      'password' => Input::get('password'),
	      
	   ));
	   if($validator->fails()){
	      $errors = $validator->messages()->all();
	      $user->password = null;
	      return View::make('users.save')->with('user', $user)->with('errors', $errors);
	   }else{
	      $user->save();
	      return Redirect::to('users')->with('notice', 'El usuario ha sido creado correctamente.');
	   }
	}

	public function edit($id){
	// Muestra el Formulario con la información traída por el parámetro indicado
		// Permite editar un registro en particular
			// A través de GET

			// Obtener el usuario del Id que se especifique
		$user = User::find($id);
			// Mandar la variable $user a la vista Edit
		return View::make('users.save')->with('user', $user);
	}

	public function update($id){
	// Modifica el registro recibido por la función edit
		// A través de PUT

			// Editar los datos recibidos por la función Edit
			$user = User::find($id);
			$user->id_collaborator = Input::get('id_collaborator');
	    $user->full_name = Input::get('full_name');
	    $user->username = Input::get('username');
	    $user->email = Input::get('email');

	    $validator = User::validate(array(
	    	'id_collaborator' => Input::get('id_collaborator'),
	      'full_name' => Input::get('full_name'),
	      'username' => Input::get('username'),
	      'email' => Input::get('email'),
	   ), $user->id);
	   if($validator->fails()){
	      $errors = $validator->messages()->all();
	      return View::make('users.save')->with('user', $user)->with('errors', $errors);
	   }else{
	      $user->save();
	      return Redirect::to('users')->with('notice', 'Los datos del usuario se han actualizado correctamente.');
	   }
	}

	public function destroy($id){
	// Permite eliminar un registro de la base de datos
		// A través de DELETE

			// Obtener el usuario del Id que se especifique
		$user = User::find($id);
			// Eliminar el registro de la variable $user
	   	$user->delete();
	   		// Redirigir al usuario a la vista Index
	    return Redirect::to('users')->with('notice', 'El usuario ha sido eliminado correctamente.');
	}
}