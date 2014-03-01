<?php

class CurriculumsController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'courses');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$course = Course::with('curriculums')->find($id);
		$curriculums = $course->curriculums;
        return View::make('curriculums.index', compact('course', 'curriculums'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('curriculums.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Curriculum::create(Input::all());
		return Redirect::back()->with('suc', 'New Curriculum has been Added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($course_id, $id)
	{
		$curriculum = Curriculum::with('curriculum_subjects.subject', 'curriculum_subjects.pre_requisites.subject')->find($id);
        return View::make('curriculums.show', compact('course_id', 'curriculum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($course_id, $id)
	{
		$curriculum = Curriculum::find($id);
        return View::make('curriculums.edit', compact('course_id', 'curriculum'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($course_id, $id)
	{
		Curriculum::find($id)->update(Input::all());
		return Redirect::route('courses.curriculums.index', $course_id)->with('suc', 'Curriculum has been Updated!');
       
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
