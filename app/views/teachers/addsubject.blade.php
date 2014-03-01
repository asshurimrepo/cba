<div class="modal hide fade" id="myModal">

{{ Form::open(['route'=>['teachers.update', $teacher->id], 'style'=>'margin:0', 'class'=>'form-horizontal', 'method'=>'put']) }}

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Assign a Subject</h3>
	</div>
	<div class="modal-body">
		

		<fieldset>

			{{ Form::hidden('teacher_id', $teacher->id) }}

 			<div class="control-group">
				{{ Form::label('subject_id', 'Subject', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('subject_id', $subjects, null, ['required'=>'', 'data-placeholder'=>'Select Subject by Curriculum', 'data-rel'=>'chosen']) }}
				  
				</div>
			  </div>
				
			  
			<br>
			<br>
			<br>
			<br>
			<br>
			  

		</fieldset>	



	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button  class="btn btn-primary">Submit</button>
	</div>

{{ Form::close() }}

</div>