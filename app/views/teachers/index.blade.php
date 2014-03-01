@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span7">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>Teachers </h2>
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
								  <th>Gender</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($teachers as $t)
						  	<tr>
								<td class="center">{{ $t->fname }} </td>
								<td class="center">{{ $t->mname }} </td>
								<td class="center">{{ $t->lname }} </td>
								<td class="center">{{ $t->gender }} </td>
								
								<td class="center span2">

								{{ Form::open(['route'=>['teachers.destroy', $t->id], 'method'=>'delete', 'style'=>'margin:0;']) }}	

									<a class="btn btn-info" href="{{ route('teachers.edit', [$t->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit Student">
										<i class="halflings-icon edit"></i>  
									</a>

									<a class="btn btn-info" href="{{ route('teachers.show', [$t->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="See Subjects Assigned">
										<i class="halflings-icon list-alt"></i>  
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
				
				@include('teachers.create')

			
			</div>

@stop

@section('modals')

	
@stop