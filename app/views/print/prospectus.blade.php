@extends('acme_master')

@section('body')
<div style="width:90%; margin:0 auto;">
	<center>
		
		<h3>Republic of the Philippines</h3>
		<h2>NEGROS ORIENTAL STATE UNIVERSITY</h2>
		<h3>Siaton Campus</h3>

		<hr>

		<h2>COLLEGE OF BUSINESS ADMINSTRATION</h2>

		<h1>{{ $course_name }}</h1>
		<p><i>{{ $c->description }}</i></p>



	</center>

	<hr>

@if(isset($student))
	<p> <b>Name:</b> <u>{{ $student->fullname() }}</u> </p>
@endif

	@include('print.table', ['t_title'=>'FIRST YEAR, FIRST SEMESTER', 'lvl'=>1, 'sem'=>'First'])
	@include('print.table', ['t_title'=>'FIRST YEAR, SECOND SEMESTER', 'lvl'=>1, 'sem'=>'Second'])
	@include('print.table', ['t_title'=>'SECOND YEAR, FIRST SEMESTER', 'lvl'=>2, 'sem'=>'First'])
	@include('print.table', ['t_title'=>'SECOND YEAR, SECOND SEMESTER', 'lvl'=>2, 'sem'=>'Second'])

	@include('print.table', ['t_title'=>'THIRD YEAR, FIRST SEMESTER', 'lvl'=>3, 'sem'=>'First'])
	@include('print.table', ['t_title'=>'THIRD YEAR, SECOND SEMESTER', 'lvl'=>3, 'sem'=>'Second'])

	@include('print.table', ['t_title'=>'FOURTH YEAR, FIRST SEMESTER', 'lvl'=>4, 'sem'=>'First'])
	@include('print.table', ['t_title'=>'FOURTH YEAR, SECOND SEMESTER', 'lvl'=>4, 'sem'=>'Second'])
	

</div>
@stop