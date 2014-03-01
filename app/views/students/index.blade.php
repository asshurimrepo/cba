@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span7">
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
						  	@foreach($students as $s)
						  	<tr>
								<td class="center">{{ $s->fname }} </td>
								<td class="center">{{ $s->mname }} </td>
								<td class="center">{{ $s->lname }} </td>
								<!-- <td class="center">{{ $s->bdate }} </td> -->
								<td class="center">{{ $s->gender }} </td>
								<td class="center">{{ $s->course->code }} </td>
								<td class="center">SY {{ $s->curriculum->sy }} </td>
								
								<td class="center span3">

								{{ Form::open(['route'=>['students.destroy', $s->id], 'method'=>'delete', 'style'=>'margin:0;', 'class'=>'ondelete']) }}	

									<a class="btn btn-info" href="{{ route('students.edit', [$s->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit Student">
										<i class="halflings-icon edit"></i>  
									</a>

									<a class="btn btn-info" href="{{ route('students.show', [$s->id]) }}" data-rel="tooltip" data-placement="top" data-original-title=" Subjects">
										<i class="halflings-icon list-alt"></i>  
									</a>

									<a class="btn btn-info" href="{{ url('print/prospectus/'.$s->id) }}" target="_blank" data-rel="tooltip" data-placement="top" data-original-title="Print Prospectos">
										<i class="halflings-icon print"></i>  
									</a>


									{{-- 
									<button class="btn btn-danger delete_btn" href="#ash" data-rel="tooltip" data-placement="top" data-original-title="Remove Data">
										<i class="halflings-icon trash halflings-icon"></i> 
									</button>  --}}

								{{ Form::close() }}


								</td>
							</tr>
							@endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->

				@include('students.create')

			
			</div>

@stop

@section('modals')

	
@stop