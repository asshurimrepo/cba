@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>Teacher > {{ $teacher->fullname() }} > Manage Subjects Assigned </h2>
						<div class="box-icon">
							<!-- <a href="#" class="btn-setting"><i class="halflings-icon plus"></i></a> -->
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
								  <th>Subject Code</th>
								  <th>Subject Description</th>
								  <th>Subject Units</th>
								  <!-- <th>Actions</th> -->
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach ($teacher->enrollments as $e)

						  		<tr>
						  			
						  			<td>{{ $e->subject->sub_code }}</td>
						  			<td>{{ $e->subject->description }}</td>
						  			<td>{{ $e->subject->units }}</td>
						  			{{-- <td>
						  				
						  				{{ Form::open(['route'=>['teachers.destroy', $e->subject->id], 'method'=>'delete', 'style'=>'margin:0;']) }}	

									
									<button class="btn btn-danger delete_btn" href="#ash" data-rel="tooltip" data-placement="top" data-original-title="Un-assign Subject">
										<i class="halflings-icon remove "></i> 
									</button>  

								{{ Form::close() }}

						  			</td> --}}

						  		</tr>

						  	@endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>

@stop

@section('modals')

	@include('teachers.addsubject')
	
@stop