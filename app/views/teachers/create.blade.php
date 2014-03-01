
<div class="box span5">
	<div class="box-header" data-original-title="">
		<h2><i class="fa-icon-plus"></i><span class="break"></span> Add New Teacher </h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		

{{ Form::open(['route'=>'teachers.store', 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	
	<fieldset>

			{{-- Username --}}
			  <div class="control-group">
				{{ Form::label('username', 'Username', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('username', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			  {{-- Password --}}
			  <div class="control-group">
				{{ Form::label('password', 'Password', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::password('password',  ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>


				{{-- Fname --}}
			  <div class="control-group">
				{{ Form::label('fname', 'First Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('fname', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			
			  {{-- Mname --}}
			  <div class="control-group">
				{{ Form::label('mname', 'Middle Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('mname', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			   {{-- Lname --}}
			  <div class="control-group">
				{{ Form::label('lname', 'Last Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('lname', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			  {{-- Gender --}}
			  <div class="control-group">
				{{ Form::label('gender', 'Gender', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('gender', [1=>'Male', 2=>'Female'], null, ['required'=>true, 'class'=>'']) }}
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