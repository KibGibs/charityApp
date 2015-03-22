<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function home(){
		if(Auth::check()){
			$data = array(
				'users' => User::where('status', 0)->get(),
			);
			return View::make('users',$data);
		}
		else{
			return Redirect::action('HomeController@login')->with('error','You need to login first!');
		}
		
	}

	public function login(){

		//$user = User::find(1);
		//dd($user->isAdmin());

		return View::make('layout.login');
	
	}

	public function logout(){

		Auth::logout();
		return Redirect::action('HomeController@login');
	}

	public function doLogin(){

		$data = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
		);

		if(Auth::attempt($data)){
			return Redirect::action('HomeController@home');
		}
		else{
			return Redirect::action('HomeController@login')->with('error','Invalid Username or Password');

		}
	}

	public function register(){
		// $user = new User;
		// $user->first_name = 'margibs';
		// $user->password = Hash::make('123123');
		// $user->username = 'margibs';

		// $user->save(); 
	}



}
