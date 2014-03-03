@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span7">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>{{ link_to_route('courses.index', $course->name) }} > Curriculums </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>SY</th>
								  <th>Description</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($curriculums as $c)
						  	<tr>
								<td class="center">{{ $c->sy }} </td>
								<td class="center">{{ $c->description }} </td>
								
								<td class="center span3">

									<a class="btn btn-info" href="{{ route('courses.curriculums.show', [$course->id, $c->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Subjects">
										<i class="halflings-icon list-alt"></i>  
									</a>

									<a class="btn btn-info" href="{{ route('courses.curriculums.edit', [$course->id, $c->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit Curriculum">
										<i class="halflings-icon edit"></i>  
									</a>


									<a class="btn btn-info" href="{{ url('print/view-prospectus/'.$c->id) }}" target="_blank" data-rel="tooltip" data-placement="top" data-original-title="Prospectus View">
										<i class="halflings-icon list"></i>  
									</a>

									{{-- <button class="btn btn-danger delete_btn" href="#ash" data-rel="tooltip" data-placement="top" data-original-title="Remove Data">
										<i class="halflings-icon trash halflings-icon"></i> 
									</button> --}}



								</td>
							</tr>
							@endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->

				@include('curriculums.create')

			
			</div>

@stop

@section('modals')

	
@stop