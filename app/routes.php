<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('auth', 'AuthController');
Route::controller('print', 'PrintController');


Route::group(['before'=>'auth'], function(){

	Route::resource('courses.curriculums', 'CurriculumsController');

	Route::resource('enrollments', 'EnrollmentsController');

	
	Route::resource('users', 'UsersController');	
	
	Route::resource('courses', 'CoursesController');

	Route::resource('currsubj', 'CurrSubjController');

	Route::resource('subjects', 'SubjectsController');

	Route::resource('prerequisites', 'PrerequisitesController');


	Route::resource('students', 'StudentsController');

	Route::resource('enrollments', 'EnrollmentsController');

	Route::resource('teachers', 'TeachersController');	

	Route::controller('/', 'AdminController');

});


