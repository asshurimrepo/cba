@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>Teacher > {{ $teacher->fullname() }} > Submit Grades </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Subject Code</th>
								  <th>Subject Description</th>
								  <th>Subject Units</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach ($teacher->enrollments as $e)

						  		<tr>
						  			
						  			<td>{{ $e->subject->sub_code }}</td>
						  			<td>{{ $e->subject->description }}</td>
						  			<td>{{ $e->subject->units }}</td>
						  			<td>
						  				
						  				<a class="btn btn-info" href="{{ url('submit-grades/'.$e->subject->id) }}" data-rel="tooltip" data-placement="top" data-original-title="Submit Grade">
										<i class="halflings-icon share"></i>  
									</a>

						  			</td>

						  		</tr>

						  	@endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>

@stop

