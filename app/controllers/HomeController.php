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
	public function home(){

		if(Auth::check()){
			return View::make('dashboard');
		}
		else{
			return Redirect::action('HomeController@login')->with('error','You need to login first!');
		}
		
	}

	public function users(){
		//'users' => User::where('status', 0)->get(),
		if(Auth::check()){
			$data = array(
				'users' => User::get(),
			);
			return View::make('users',$data);
		}
		else{
			return Redirect::action('HomeController@login')->with('error','You need to login first!');
		}
	}

	public function addUser(){
		
		if(Auth::check()){

			return View::make('add_user');
		}
		else{
			return Redirect::action('HomeController@login')->with('error','You need to login first!');
		}
	}

	public function login(){

		//$user = User::find(1);
		//dd($user->isAdmin());

		if(Auth::check()){
			return Redirect::action('HomeController@home');
		}
		else{
			return View::make('layout.login');
		}
	
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
		
	
		if(Auth::check()){

			$validator = Validator::make(
			    array(
			        'username' => Input::get('username'),
			        'password' => Input::get('password'),
			        'first_name' => Input::get('first_name'),
			        'last_name' => Input::get('last_name'),
			        'password_confirmation' => Input::get('password_confirmation'),
			        'email' => Input::get('email')
			    ),
			    array(
			        'username' => 'required|unique:users|min:4',
			        'first_name' => 'required',
			        'last_name' => 'required',
			        'password' => 'required|min:6|confirmed',
			        'password_confirmation' => 'required|min:6',
			        'email' => 'required|email|unique:users'
			    )
		);

		if ($validator->fails())
		{
		   return Redirect::action('HomeController@addUser')
		   ->withErrors($validator->messages())
		   ->withInput(Input::except('password', 'password_confirm'));
		}
		else
		{
			$user = new User;
			$user->last_name = Input::get('last_name');
			$user->first_name = Input::get('first_name');
			$user->password = Hash::make(Input::get('password'));
			$user->username = Input::get('username');
			$user->email = Input::get('email');

			$user->save(); 

			return Redirect::action('HomeController@users')->with('success','User Added!');
		}

		}
		else{
			return Redirect::action('HomeController@login');
		}
	}

	public function editUser($id){
		
		if(Auth::check()){
			$user = User::find($id);
			if($user){
				$data = array('user' => $user);
				return View::make('edit_user',$data);
			}
			else{
				return Redirect::action('HomeController@login');
			}
			
		}
		else{
			return Redirect::action('HomeController@login');
		}

	}

	public function update($id){

		if(Auth::check()){

			$validator = Validator::make(
			    array(
			        'first_name' => Input::get('first_name'),
			        'last_name' => Input::get('last_name'),
			        'email' => Input::get('email')
			    ),
			    array(
			        'first_name' => 'required',
			        'last_name' => 'required',
			    )
		);

		if ($validator->fails())
		{
		   return Redirect::action('HomeController@editUser', $id)
		   ->withErrors($validator->messages());
		}
		else
		{
			$user = User::find($id);
			$user->last_name = Input::get('last_name');
			$user->first_name = Input::get('first_name');

			$user->save(); 

			return Redirect::action('HomeController@users')->with('success','User Updated!');
		}

		}
		else{
			return Redirect::action('HomeController@login');
		}

	}


}
