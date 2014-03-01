<?php

class TeachersController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'teachers');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$teachers = Teacher::all();
        return View::make('teachers.index', compact('teachers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('teachers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = User::create(['name'=>Input::get('fname'), 'username'=>Input::get('username'), 'password'=>Hash::make(Input::get('password'))]);

		$data = Input::except('username', 'password');
		$data['user_id'] = $user->id;

		Teacher::create($data);
		return Redirect::back()->with('suc', '<b>New Teacher has been Added!</b>');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$teacher = Teacher::with('enrollments.subject')->find($id);
		$subjects = Enrollment::groupBy('subject_id')->lists('subject_id');
		$subjects = Subject::whereIn('id', $subjects)->lists('sub_code', 'id');

        return View::make('teachers.show', compact('teacher', 'subjects'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$teacher = Teacher::find($id);
        return View::make('teachers.edit', compact('teacher', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		if(Input::has('subject_id')){
			Enrollment::where('subject_id', Input::get('subject_id'))->update(['teacher_id'=>$id]);
			return Redirect::back()->with('suc', '<b>Teacher Subjects has been Updated!</b>');
		}

		Teacher::find($id)->update(Input::all());
		return Redirect::route('teachers.index')->with('suc', '<b>Teacher has been Updated!</b>');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($subject_id)
	{
		Enrollment::where('subject_id', $subject_id)->update(['teacher_id'=>'']);
		return Redirect::back()->with('suc', '<b>Teacher Subjects has been Updated!</b>');

	}

}
