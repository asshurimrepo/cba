@extends('acme')

@section('c')

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Subject Entry </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						
						{{ Form::model($currsubj, ['route'=>['currsubj.update', $currsubj->id], 'style'=>'margin:0', 'class'=>'form-horizontal', 'method'=>'put']) }}

							<fieldset>

									
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
				  {{ Form::select('pre_requisites[]', Subject::lists('sub_code','id'), $prerequisites, ['multiple'=>true,  'data-rel'=>'chosen']) }}
				  
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

			  <div class="form-actions">

				<button type="submit" class="btn btn-primary">Save changes</button>
			 	<a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>

			  </div>

							</fieldset>	

					{{ Form::close() }}

					</div>
				</div><!--/span-->
			
			</div><!--/row-->
	
@stop