<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('admin/users', 'Admin_UsersController');
Route::resource('posts', 'PostsController');


Route::get('layouts/template/{name}', function ($name) {
   $name = ucwords(str_replace('-', ' ', $name));
   return View::make('template')->with('name', $name); 
});

//form login
Route::get('/', array('before' => 'guest', function()
{
    return View::make('login');
}));

// check login
Route::post('login', 'HomeController@index');
 
// home page
Route::get('home', array('before' => 'auth', function()
{
    if(Entrust::hasRole('User')) {
            return View::make('home_user');
        }
        else if(Entrust::hasRole('Admin')) {
            return View::make('home_admin');
        }
        else {
            Auth::logout();
            return Redirect::to('/login')
                ->with('flash_notice', 'You don\'t have access!');
        }

    return App::abort(403);
}));
 
// logout route
Route::get('logout', array('before' => 'auth', function()
{
    Auth::logout();
    return Redirect::to('/')
            ->with('flash_notice', 'You are successfully logged out.');
}));

Route::get('/start', function()
{
    $admin = new Role();
    $admin->name = 'Admin';
    $admin->save();
 
    $user = new Role();
    $user->name = 'User';
    $user->save();
 
    $read = new Permission();
    $read->name = 'can_read';
    $read->display_name = 'Can Read Data';
    $read->save();
 
    $edit = new Permission();
    $edit->name = 'can_edit';
    $edit->display_name = 'Can Edit Data';
    $edit->save();
 
    $user->attachPermission($read);
    $admin->attachPermission($read);
    $admin->attachPermission($edit);

    $adminRole = DB::table('roles')->where('name', '=', 'Admin')->pluck('id');
    $userRole = DB::table('roles')->where('name', '=', 'User')->pluck('id');
    // print_r($userRole);
    // die();
 
    $user1 = User::where('username','=','imron02')->first();
    $user1->roles()->attach($adminRole);
    $user2 = User::where('username','=','asih')->first();
    $user2->roles()->attach($userRole);
    $user3 = User::where('username','=','sarah')->first();
    $user3->roles()->attach($userRole);
});