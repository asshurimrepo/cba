<?php

class PrintController extends BaseController {

	public function getProspectus($id)
	{
		$student = Student::with('curriculum', 'course')->find($id);
		$currsubjs = CurrSubj::where('curriculum_id', $student->curriculum_id)->get();

		return View::make('print.prospectus', compact('student', 'currsubjs'));
	}

}
