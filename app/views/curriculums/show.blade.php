@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span7">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>{{ link_to_route('courses.curriculums.index',  'Curriculum', $course_id) }} >  Subjects </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon plus"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Subject Code</th>
								  <th>Subject Description</th>
								  <th>Units</th>
								  <th>Pre-requisites</th>
								  <th>Year Level</th>
								  <th>Semester</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($curriculum->curriculum_subjects as $c)
						  	<tr>
								<td class="center">{{ $c->subject->sub_code }} </td>
								<td class="center">{{ $c->subject->description }} </td>
								<td class="center">{{ $c->subject->units }} </td>
								<td class="center">{{ implode(', ', $c->list_preq()) }} </td>
								<td class="center">{{ $c->year_lvl }} </td>
								<td class="center">{{ $c->semester }} </td>
								
								<td class="center">
								{{ Form::open(['route'=>['currsubj.destroy', $c->id], 'method'=>'delete', 'style'=>'margin:0; padding:0;', 'class'=>'ondelete']) }}	

									<a class="btn btn-info" href="{{ route('currsubj.edit', [$c->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit Subject Entry">
										<i class="halflings-icon edit"></i>  
									</a>

									<button class="btn btn-danger delete_btn" href="#ash" data-rel="tooltip" data-placement="top" data-original-title="Remove Data">
										<i class="halflings-icon trash halflings-icon"></i> 
									</button> 

								{{ Form::close() }}

										
								</td>
							</tr>
							@endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->

	@include('subjects.addsubject')

			
			</div>

@stop

@section('modals')

	
@stop