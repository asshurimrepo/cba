@extends('acme')

@section('c')

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Subject </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						
						{{ Form::model($enrollment, ['route'=>['enrollments.update', $id], 'style'=>'margin:0', 'class'=>'form-horizontal', 'method'=>'put']) }}

							<fieldset>

							 <div class="control-group">
								{{ Form::label('curriculum_subject_id', 'Subject', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::select('curriculum_subject_id', Curriculum::list_subjects($enrollment->student->curriculum_id), null, ['required'=>'']) }}
								  
								</div>
							  </div>
						
							 
								<div class="control-group">
								{{ Form::label('teacher_id', 'Teacher Assigned', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::select('teacher_id', Teacher::lists('fname','id'), null, ['required'=>'', 'data-placeholder'=>'Select Teacher']) }}
								  
								</div>
							  </div> 

							  <div class="form-actions">

								<button type="submit" class="btn btn-primary">Save changes</button>
							 	<a href="{{ route('students.show', $enrollment->student->id) }}" class="btn btn-danger">Return</a>

							  </div>

							</fieldset>	

					{{ Form::close() }}

					</div>
				</div><!--/span-->
			
			</div><!--/row-->
	
@stop