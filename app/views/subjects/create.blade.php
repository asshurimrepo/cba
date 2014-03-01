



<div class="box span5">
	<div class="box-header" data-original-title="">
		<h2><i class="fa-icon-plus"></i><span class="break"></span> Add New Subject </h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		

{{ Form::open(['route'=>'subjects.store', 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	
	<fieldset>

	{{-- Code--}}
			  <div class="control-group">
				{{ Form::label('sub_code', 'Subject Code', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('sub_code', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			 {{-- Description--}}
			  <div class="control-group">
				{{ Form::label('description', 'Description', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('description', null, ['required'=>true, 'class'=>'']) }}
				</div>
			  </div>

			  {{-- Description--}}
			  <div class="control-group">
				{{ Form::label('units', 'Units', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::text('units', null, ['required'=>true, 'class'=>'']) }}
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