@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span8">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span> Subjects > {{ $student->fullname() }} </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon plus"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
								  <th>Subject Code</th>
								  <!-- <th>Subject Description</th> -->
								  <th>Subject Units</th>
								  <th>Instructor</th>
								  <th>Grade</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($student->enrollments as $e)
						  	<tr>
								<td class="center">{{ $e->currsubj->subject->sub_code }} </td>
								<!-- <td>{{ $e->currsubj->subject->description }} </td> -->
								<td>{{ $e->currsubj->subject->units }} </td>
								<td>{{ $e->teacher ? $e->teacher->fullname() : '' }}</td>
								<td>{{ $e->grade }}</td>
								
								<td class="center ">

								{{ Form::open(['route'=>['enrollments.destroy', $e->id], 'method'=>'delete', 'style'=>'margin:0;', 'class'=>'ondelete']) }}	

									<a class="btn btn-info" href="{{ route('enrollments.edit', [$e->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit ">
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

				@include('enrollments.create')

			
			</div>

@stop

@section('modals')

	
@stop