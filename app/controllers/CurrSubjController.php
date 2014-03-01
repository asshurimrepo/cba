<?php

class CurrSubjController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('currsubjs.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('currsubjs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::except('pre_requisites');
		$pre_requisites = Input::get('pre_requisites');

		$currsubj = CurrSubj::create($data);

		if(is_array($pre_requisites)){
			foreach ($pre_requisites as $subject_id) {
				$currsubj->pre_requisites()->create(['subject_id'=>$subject_id]);
			}
		}

		return Redirect::back()->with('suc', '<b>New Subject has been added to this Curriculum!</b>');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('currsubjs.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$currsubj = CurrSubj::with('pre_requisites')->find($id);
		$prerequisites = $currsubj->pre_requisites->lists('subject_id');
		// return $prerequisites;
        return View::make('curriculums.editsubject', compact('currsubj', 'prerequisites'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::except('pre_requisites');
		$pre_requisites = Input::get('pre_requisites');

		$currsubj = CurrSubj::find($id);
		$currsubj->update($data);

		if(is_array($pre_requisites)){
			Prerequisite::where('curr_subj_id', $id)->delete();

			foreach ($pre_requisites as $subject_id) {
				$currsubj->pre_requisites()->create(['subject_id'=>$subject_id]);
			}
		}
		return Redirect::route('courses.curriculums.show', [$currsubj->curriculum->course_id, $currsubj->curriculum->id])->with('suc', '<b>Subject Entry of this Curriculum has been updated!</b>');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CurrSubj::find($id)->delete();
		return Redirect::back()->with('suc', 'Subject Entry has been removed!');
	}

}
