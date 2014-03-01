@extends('acme')

@section('c')

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Teacher </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						
						{{ Form::model($teacher, ['route'=>['teachers.update', $id], 'style'=>'margin:0', 'class'=>'form-horizontal', 'method'=>'put']) }}

							<fieldset>

							{{-- Fname --}}
			  <div class="control-group">
				{{ Form::label('fname', 'First Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('fname', null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

			
			  {{-- Mname --}}
			  <div class="control-group">
				{{ Form::label('mname', 'Middle Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('mname', null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

			   {{-- Lname --}}
			  <div class="control-group">
				{{ Form::label('lname', 'Last Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('lname', null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

			  {{-- Gender --}}
			  <div class="control-group">
				{{ Form::label('gender', 'Gender', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('gender', [1=>'Male', 2=>'Female'], null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

							  <div class="form-actions">

								<button type="submit" class="btn btn-primary">Save changes</button>
							 	<a href="{{ route('teachers.index') }}" class="btn btn-danger">Return</a>

							  </div>

							</fieldset>	

					{{ Form::close() }}

					</div>
				</div><!--/span-->
			
			</div><!--/row-->
	
@stop