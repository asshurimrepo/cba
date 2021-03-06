






<div class="box span5">
	<div class="box-header" data-original-title="">
		<h2><i class="fa-icon-plus"></i><span class="break"></span> Add New Course </h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		

{{ Form::open(['route'=>'courses.store', 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	
	<fieldset>

			{{-- Code--}}
			  <div class="control-group">
				{{ Form::label('code', 'Course Code', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('code', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			 {{-- Name--}}
			  <div class="control-group">
				{{ Form::label('name', 'Name', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('name', null, ['required'=>true, 'class'=>'']) }}
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