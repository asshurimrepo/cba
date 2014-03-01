@extends('acme')

@section('c')

	<h1 ><center>Welcome, {{ Auth::user()->fullname() }}</center></h1>

	<br>

	<div class="box-content">
						
						<a class="quick-button span2" href="{{ url('users') }}">
							<i class="fa-icon-group"></i>
							<p>Users</p>
							<span class="notification red">{{ User::isAdmin()->count() }}</span>
						</a>
						<a class="quick-button span2" href="{{ url('students') }}">
							<i class="fa-icon-group"></i>
							<p>Students</p>
							<span class="notification red">{{ Student::count() }}</span>
						</a>
						<a class="quick-button span2" href="{{ url('teachers') }}"> 
							<i class="fa-icon-group"></i>
							<p>Teachers</p>
							<span class="notification red">{{ Teacher::count() }}</span>
						</a>
						<a class="quick-button span2" href="{{ url('subjects') }}">
							<i class="fa-icon-reorder"></i>
							<p>Subjects</p>
							<span class="notification red">{{ Subject::count() }}</span>
						</a>
						<a class="quick-button span2" href="{{ url('courses') }}">
							<i class="fa-icon-reorder"></i>
							<p>Courses</p>
							<span class="notification red">{{ Course::count() }}</span>
						</a>
						<a class="quick-button span2" href="{{ url('about-us') }}">
							<i class=" fa-icon-info-sign"></i>
							<p>About Us</p>
						</a>
						<div class="clearfix"></div>
					</div>

	<center>
	<br>

		<h1><b>Vision</b></h1>
		<p>{{ Setting::find(1)->vision }}</p>

		<h1> <b>Mission</b> </h1>
		<p>{{ Setting::find(1)->mission }}</p>

	</center>



@stop