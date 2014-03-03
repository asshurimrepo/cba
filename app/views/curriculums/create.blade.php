

<div class="box span5">
	<div class="box-header" data-original-title="">
		<h2><i class="fa-icon-plus"></i><span class="break"></span> Add New Curriculum </h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		

{{ Form::open(['route'=>['courses.curriculums.store', $course->id], 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	
	<fieldset>

			{{ Form::hidden('course_id', $course->id) }}

			{{-- SY--}}
			  <div class="control-group">
				{{ Form::label('sy', 'School Year', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('sy', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			 {{-- Description--}}
			  <div class="control-group">
				{{ Form::label('description', 'Description', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::textarea('description', null, ['required'=>true, 'class'=>'']) }}
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