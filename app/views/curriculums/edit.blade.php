@extends('acme')

@section('c')

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Curriculum </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						
						{{ Form::model($curriculum, ['route'=>['courses.curriculums.update', $course_id, $curriculum->id], 'style'=>'margin:0', 'class'=>'form-horizontal', 'method'=>'put']) }}

							<fieldset>

							{{ Form::hidden('course_id', $course_id) }}

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

							 <div class="form-actions">

								<button type="submit" class="btn btn-primary">Save changes</button>
							 	<a href="{{ route('courses.curriculums.index', $course_id) }}" class="btn btn-danger">Cancel</a>

							  </div>


							</fieldset>	

					{{ Form::close() }}

					</div>
				</div><!--/span-->
			
			</div><!--/row-->
	
@stop