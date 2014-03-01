@extends('acme')

@section('c')

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit User </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						
						{{ Form::model($user, ['route'=>['users.update', $user->id], 'style'=>'margin:0', 'class'=>'form-horizontal', 'method'=>'put']) }}
						{{ Form::hidden('is_admin', 2) }}

							<fieldset>

							 {{-- f--}}
							  <div class="control-group">
								{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::text('name', null, ['required'=>true, 'class'=>'']) }}
								</div>
							  </div>

							 {{-- f--}}
							  <div class="control-group">
								{{ Form::label('username', 'Username', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::text('username', null, ['required'=>true, 'class'=>'']) }}
								</div>
							  </div>

							  {{-- f--}}
							  <div class="control-group">
								{{ Form::label('password', 'New Password', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::password('password',  [ 'class'=>'']) }}
								</div>
							  </div>

							  {{-- f--}}
							  <div class="control-group">
								{{ Form::label('is_admin', 'Administrator Access', ['class'=>'control-label']) }}
								<div class="controls">
								  {{ Form::checkbox('is_admin') }}
								</div>
							  </div>

							  <div class="form-actions">

								<button type="submit" class="btn btn-primary">Save changes</button>
							 	<a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>

							  </div>

							</fieldset>	

					{{ Form::close() }}

					</div>
				</div><!--/span-->
			
			</div><!--/row-->
	
@stop