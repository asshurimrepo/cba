@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span> {{ $title }} </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>First Name</th>
								  <th>Middle Name</th>
								  <th>Last Name</th>
								  <!-- <th>Bdate</th> -->
								  <th>Gender</th>
								  <th>Course</th>
								  <th>Curriculum</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($course->students as $s)
						  	<tr>
								<td class="center">{{ $s->fname }} </td>
								<td class="center">{{ $s->mname }} </td>
								<td class="center">{{ $s->lname }} </td>
								<!-- <td class="center">{{ $s->bdate }} </td> -->
								<td class="center">{{ $s->gender }} </td>
								<td class="center">{{ $s->course->code }} </td>
								<td class="center">SY {{ $s->curriculum->sy }} </td>
								
								<td class="center span3">


									<a class="btn btn-info" href="{{ route('students.edit', [$s->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit Student">
										<i class="halflings-icon edit"></i>  
									</a>

									<a class="btn btn-info" href="{{ route('students.show', [$s->id]) }}" data-rel="tooltip" data-placement="top" data-original-title=" Subjects">
										<i class="halflings-icon list-alt"></i>  
									</a>

									<a class="btn btn-info" href="{{ url('print/prospectus/'.$s->id) }}" target="_blank" data-rel="tooltip" data-placement="top" data-original-title="Print Prospectos">
										<i class="halflings-icon print"></i>  
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