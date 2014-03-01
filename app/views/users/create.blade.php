<div class="box span5">
	<div class="box-header" data-original-title="">
		<h2><i class="fa-icon-plus"></i><span class="break"></span> Add New User </h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		

{{ Form::open(['route'=>'users.store', 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	
	<fieldset>

	{{ Form::hidden('is_admin', 2) }}

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
				{{ Form::label('password', 'Password', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::password('password',  ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			  {{-- f--}}
			  <div class="control-group">
				{{ Form::label('is_admin', 'Administrator Access', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::checkbox('is_admin') }}
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