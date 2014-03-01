



<div class="box span4">
	<div class="box-header" data-original-title="">
		<h2><i class="fa-icon-plus"></i><span class="break"></span> Add Subject </h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		

{{ Form::open(['route'=>'enrollments.store', 'style'=>'margin:0', 'class'=>'form-horizontal']) }}
	  

			<fieldset>

			{{ Form::hidden('student_id', $student->id) }}
			


			  <div class="control-group">
				{{ Form::label('curriculum_subject_id', 'Subject', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('curriculum_subject_id', Curriculum::list_subjects($student->curriculum_id, $student->enrollments->lists('subject_id')), null, ['required'=>'', 'data-placeholder'=>'Select Subject by Curriculum', 'style'=>'width: 150px;']) }}
				  
				</div>
			  </div>
		
			
				 <div class="control-group">
				{{ Form::label('teacher_id', 'Teacher Assigned', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('teacher_id', Teacher::lists('fname','id'), null, ['required'=>'', 'data-placeholder'=>'Select Teacher' , 'style'=>'width: 150px;']) }}
				  
				</div>
			  </div> 	
			  


			  <div class="control-group">
				<div class="controls">
				<button type="submit" class="btn btn-primary">Add Subject</button>
				</div>
			  </div>
			  


		</fieldset>
	

{{ Form::close() }}


	</div>
</div>