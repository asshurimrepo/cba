<?php

class SubjectsController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'subjects');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subjects = Subject::all();  
        return View::make('subjects.index', compact('subjects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('subjects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Subject::create(Input::all());
		return Redirect::back()->with('suc', 'New Subject has been Added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('subjects.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subject = Subject::find($id);
        return View::make('subjects.edit', compact('id', 'subject'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Subject::find($id)->update(Input::all());
		return Redirect::route('subjects.index')->with('suc', 'Subject has been Updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subject::find($id)->delete();
		return Redirect::back()->with('suc', '<b>Subject has been Removed!</b>');
	}

}
