@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span7">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span> Courses </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Code</th>
								  <th>Course</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($courses as $c)
						  	<tr>
								<td class="center">{{ $c->code }} </td>
								<td class="center">{{ $c->name }} </td>
								
								<td class="center span3">

								{{ Form::open(['route'=>['courses.destroy', $c->id], 'method'=>'delete', 'style'=>'margin:0;']) }}	

									<a class="btn btn-info" href="{{ route('courses.curriculums.index', [$c->id]) }}" data-rel="tooltip" data-placement="top" data-original-title=" Curriculums">
										<i class="halflings-icon list-alt"></i>  
									</a>

									<a class="btn btn-info" href="{{ url('course-students/'.$c->id) }}" data-rel="tooltip" data-placement="top" data-original-title=" View Students">
										<i class="halflings-icon user"></i>  
									</a>
									

									{{-- <button class="btn btn-danger delete_btn" href="#ash" data-rel="tooltip" data-placement="top" data-original-title="Remove Data">
										<i class="halflings-icon trash halflings-icon"></i> 
									</button> --}}

								{{ Form::close() }}


								</td>
							</tr>
							@endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->

					@include('courses.create')

			
			</div>

@stop

@section('modals')

	
@stop