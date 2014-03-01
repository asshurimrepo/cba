<?php

class AuthController extends BaseController {

	public function getIndex()
	{
		return View::make('login');
	}

	public function postCheck()
	{
		// return Input::all();
		$credentials = [
			'username'=>Input::get('username'),
			'password'=>Input::get('password')
		];	

		if(Auth::attempt($credentials)){
			return Redirect::to('/');
		}

		return Redirect::back()->with('err','<b>Username and Passwrod Did not match! </b>')->withInput();
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('auth')->with('suc','<b>You have successfully Logout! </b>')->withInput();

	}

	// Get Time
	public function getTime()
	{
		return date('h:i:s a, M d, Y');
	}

}
