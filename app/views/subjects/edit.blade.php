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
						
						{{ Form::model($subject, ['route'=>['subjects.update', $id], 'style'=>'margin:0', 'class'=>'form-horizontal', 'method'=>'put']) }}

							<fieldset>

							{{-- Code--}}
							  <div class="control-group">
								{{ Form::label('sub_code', 'Subject Code', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::text('sub_code', null, ['required'=>true, 'class'=>'input-xlarge']) }}
								</div>
							  </div>

							 {{-- Description--}}
							  <div class="control-group">
								{{ Form::label('description', 'Description', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::text('description', null, ['required'=>true, 'class'=>'input-xlarge']) }}
								</div>
							  </div>

							  {{-- Description--}}
							  <div class="control-group">
								{{ Form::label('units', 'Units', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::text('units', null, ['required'=>true, 'class'=>'input-xlarge']) }}
								</div>
							  </div>

							  <div class="form-actions">

								<button type="submit" class="btn btn-primary">Save changes</button>
							 	<a href="{{ route('subjects.index') }}" class="btn btn-danger">Cancel</a>

							  </div>

							</fieldset>	

					{{ Form::close() }}

					</div>
				</div><!--/span-->
			
			</div><!--/row-->
	
@stop