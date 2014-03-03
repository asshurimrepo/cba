<?php

class AdminController extends BaseController {

	public function __construct()
	{
		
	}

	
	public function getIndex()
	{
		Session::put('active', '/');
		return View::make('main.index');
	}

	public function getSubmitGrades($sub_id = null)
	{
		Session::put('active', 'submit-grades');
		$teacher = Teacher::with('enrollments.subject')->where('user_id', Auth::user()->id)->first();


		if($sub_id){
			$subject = Subject::find($sub_id);
			$enrollments = Enrollment::with('student.course', 'subject')->where('subject_id', $sub_id)->where('teacher_id', $teacher->id)->get();
			return View::make('teachers.viewstudents', compact('teacher','enrollments', 'subject'));
		}


		return View::make('teachers.submitgrades', compact('teacher'));
	}

	public function postSumbitGrades($value='')
	{
		Enrollment::find(Input::get('id'))->update(['grade'=>Input::get('grade')]);
	}


	// View Course Students

	public function getCourseStudents($id)
	{
		$course = Course::with('students')->find($id);
		$title = $course->code . ' Students';

		return View::make('main.filter_students', compact('course', 'title'));
	}


	public function getEvaluate()
	{
		Session::put('active', 'evaluate');
		$students = Student::with('course', 'curriculum')->get();
        return View::make('main.evaluate', compact('students'));
	}

	public function getAboutUs()
	{
		Session::put('active', 'about-us');
		return View::make('main.about_us');
	}

	public function getAccountSettings()
	{
		return View::make('account_settings');
	}

}
