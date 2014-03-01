<div class="modal hide fade" id="myModal">

{{ Form::open(['route'=>['courses.curriculums.store', $course->id], 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Add New Curriculum</h3>
	</div>
	<div class="modal-body">
		

		<fieldset>


			{{ Form::hidden('course_id', $course->id) }}

			{{-- SY--}}
			  <div class="control-group">
				{{ Form::label('sy', 'School Year', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('sy', null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

			 {{-- Description--}}
			  <div class="control-group">
				{{ Form::label('description', 'Description', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::textarea('description', null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

			  

		</fieldset>	



	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button  class="btn btn-primary">Submit</button>
	</div>

{{ Form::close() }}

</div>