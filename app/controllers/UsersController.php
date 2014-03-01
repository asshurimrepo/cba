<?php

class UsersController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'users');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::isAdmin()->get();
        return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data =  Input::all();
		$data['password'] = Hash::make($data['password']);

		User::create($data);
		return Redirect::back()->with('suc', 'New User has been added successfully!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
        return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data =  Input::except('password');

		if(Input::get('password')){
			$data = Input::all();
			$data['password'] = Hash::make($data['password']);
		}


		User::find($id)->update($data);
		return Redirect::back()->with('suc', 'successfully Saved!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
		return Redirect::back()->with('suc', 'User has been Deleted!');
	}

}
