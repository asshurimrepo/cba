@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>Students </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Student Name</th>
								  <!-- <th>Bdate</th> -->
								  <th>Gender</th>
								  <th>Course</th>
								  <th>Curriculum</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($students as $s)
						  	<tr>
								<td class="center">{{ $s->fullname() }} </td>
								<!-- <td class="center">{{ $s->bdate }} </td> -->
								<td class="center">{{ $s->gender }} </td>
								<td class="center">{{ $s->course->code }} </td>
								<td class="center">SY {{ $s->curriculum->sy }} </td>
								
								<td class="center span3">


									<a class="btn btn-info" href="{{ url('print/prospectus/'.$s->id.'/evaluate') }}" target="_blank" data-rel="tooltip" data-placement="top" data-original-title="Evaluate">
										<i class="halflings-icon list"></i>  
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

@section('modals')

	
@stop