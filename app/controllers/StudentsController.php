<?php

class StudentsController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'students');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$students = Student::with('course', 'curriculum')->get();
        return View::make('students.index', compact('students'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('students.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$data = Input::all();
		
		$curriculum = Curriculum::orderBy('id', 'desc')->where('course_id', $data['course_id'])->first();

		if(!$curriculum) 
		return Redirect::back()->with('err', '<b>There are no Curriculum Added on this course!</b>');


		$data['bdate'] = date('Y-m-d', strtotime($data['bdate']));
		$data['curriculum_id'] = $curriculum->id;
		Student::create($data);


		return Redirect::back()->with('suc', '<b>New Student has been Added!</b>');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$student = Student::with('enrollments.currsubj.subject', 'enrollments.teacher')->find($id);
		// return Curriculum::list_subjects($student->course_id);

        return View::make('students.show', compact('student'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$student = Student::find($id);
        return View::make('students.edit', compact('student', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		$data['bdate'] = date('Y-m-d', strtotime($data['bdate']));
		Student::find($id)->update($data);
		return Redirect::route('students.index')->with('suc', '<b>Update is Successful!</b>');
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
