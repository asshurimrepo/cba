<?php

class PrintController extends BaseController {

	public function getProspectus($id, $eval = false)
	{
		$student = Student::with('curriculum', 'course')->find($id);
		$currsubjs = CurrSubj::where('curriculum_id', $student->curriculum_id)->get();
		$curriculum_id = $student->curriculum_id;
		$c = Curriculum::find($curriculum_id);
		$course_name = $student->course->name;

		return View::make('print.prospectus', compact('student', 'currsubjs', 'curriculum_id', 'course_name', 'c', 'eval'));
	}

	public function getViewProspectus($id, $eval = false)
	{
		$c = Curriculum::find($id);
		$currsubjs = CurrSubj::where('curriculum_id', $id)->get();
		$curriculum_id = $id;
		$course_name = $c->course->name;

		return View::make('print.prospectus', compact( 'currsubjs', 'curriculum_id', 'course_name', 'c', 'eval'));
	}

}
