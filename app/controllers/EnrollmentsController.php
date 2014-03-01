<?php

class EnrollmentsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('enrollments.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('enrollments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$cs = CurrSubj::find(Input::get('curriculum_subject_id'));
		// $teacher_id = Enrollment::where('subject_id', $cs->subject_id)->first()->teacher_id;

		$data = Input::all();
		$data['subject_id'] = $cs->subject_id;
		// $data['teacher_id'] = $teacher_id ? $teacher_id : '';

		Enrollment::create($data);
		return Redirect::back()->with('suc', '<b>New Subject has been Added!</b>');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('enrollments.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$enrollment = Enrollment::with('student')->find($id);
        return View::make('enrollments.edit', compact('id','enrollment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cs = CurrSubj::find(Input::get('curriculum_subject_id'));
		$data = Input::all();
		$data['subject_id'] = $cs->subject_id;

		Enrollment::find($id)->update($data);
		return Redirect::back()->with('suc', '<b>Subject has been Updated!</b>');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Enrollment::find($id)->delete();
		return Redirect::back()->with('suc', '<b>Subject has been Removed!</b>');
	}

}
