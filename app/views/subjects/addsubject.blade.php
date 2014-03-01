<div class="modal hide fade" id="myModal">

{{ Form::open(['route'=>'currsubj.store', 'style'=>'margin:0', 'class'=>'form-horizontal']) }}

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Add New Subject to Curriculum</h3>
	</div>
	<div class="modal-body">
		

		<fieldset>

			{{ Form::hidden('curriculum_id', $curriculum->id) }}

			 {{--Subject--}}
			  <div class="control-group">
				{{ Form::label('subject_id', 'Subject', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('subject_id', Subject::lists('sub_code','id'), null, ['required'=>'', 'data-rel'=>'chosen']) }}
				  
				</div>
			  </div>

			  {{--Pre Requisites--}}
			  <div class="control-group">
				{{ Form::label('pre_requisites', 'Pre Requisites', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('pre_requisites[]', Subject::lists('sub_code','id'), null, ['multiple'=>true,  'data-rel'=>'chosen']) }}
				  
				</div>
			  </div>

			 

			  {{-- YR Lvl--}}
			  <div class="control-group">
				{{ Form::label('year_lvl', 'Year Level', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('year_lvl', [1=>1,2=>2,3=>3,4=>4], null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

			   {{-- Semester--}}
			  <div class="control-group">
				{{ Form::label('semester', 'Semester', ['class'=>'control-label']) }}
				<div class="controls">
				  {{ Form::select('semester', [1=>'First', 2=>'Second'],null, ['required'=>true, 'class'=>'input-xlarge']) }}
				</div>
			  </div>

			  

		</fieldset>	



	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button  class="btn btn-primary">Submit</button>
	</div>

{{ Form::close() }}

</div>