


<div class="box span5">
	<div class="box-header" data-original-title="">
		<h2><i class="fa-icon-plus"></i><span class="break"></span> Add New Student </h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		

{{ Form::open(['route'=>'students.store', 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	
	<fieldset>

	{{ Form::hidden('is_admin', 2) }}

			 

				 {{--Course--}}
			  <div class="control-group">
				{{ Form::label('course_id', 'Course', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('course_id', Course::lists('code','id'), null, ['required'=>'']) }}
				  
				</div>
			  </div>

				{{-- Fname --}}
			  <div class="control-group">
				{{ Form::label('fname', 'First Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('fname', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			
			  {{-- Mname --}}
			  <div class="control-group">
				{{ Form::label('mname', 'Middle Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('mname', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			   {{-- Lname --}}
			  <div class="control-group">
				{{ Form::label('lname', 'Last Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('lname', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			  {{-- Gender --}}
			  <div class="control-group">
				{{ Form::label('gender', 'Gender', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('gender', [1=>'Male', 2=>'Female'], null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			   {{--Bdate--}}
			  <div class="control-group">
				{{ Form::label('bdate', 'Birth Date', ['class'=>'control-label']) }}
			  <div class="controls">
			  	{{ Form::text('bdate', null, ['class'=>' datepicker']) }}
			  </div>
			</div>
			
			  

		

			  <div class="control-group">
				<div class="controls">
				<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			  </div>
			  


		</fieldset>
	

{{ Form::close() }}


	</div>
</div>