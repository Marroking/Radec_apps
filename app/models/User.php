<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */

	use HasRole;


	public static $rules = array(
			'id_collaborator' => 'required|numeric|unique:users,id_collaborator',
      'full_name' => 'required|min:3',
      'username' => 'required',
      'email' => 'required|email|unique:users,email,id',
      'password' => 'required'
    );

	public static $messages = array(
			'id_collaborator.required' => 'El número del colaborador es obligatorio',
			'id_collaborator.numeric' => 'El Id del colaborador debe contener sólo números',
			'id_collaborator.unique' => 'El número del colaborador que acabas de ingresar ya le pertenece a otro usuario',
	    'full_name.required' => 'El nombre es obligatorio.',
	    'full_name.min' => 'El nombre debe contener al menos tres caracteres.',
	    'username.required' => 'El nombre de usuario es obligatorio.',
	    'email.required' => 'El email es obligatorio.',
	    'email.email' => 'El email debe contener un formato válido.',
	    'email.unique' => 'El email que acabas de ingresar ya le pertenece a otro usuario.',
	    'password.required' => 'La contraseña es obligatoria.',
	);
	
	public static function validate($data, $id=null){
	     $reglas = self::$rules;
	     $reglas['email'] = str_replace('id', $id, self::$rules['email']);
	     $messages = self::$messages;
	     return Validator::make($data, $reglas, $messages);
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}

}