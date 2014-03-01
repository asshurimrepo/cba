@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span7">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>Manage Subjects </h2>
						<div class="box-icon">
							<!-- <a href="#" class="btn-setting"><i class="halflings-icon plus"></i></a> -->
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Code</th>
								  <th>Description</th>
								  <th>Units</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($subjects as $s)
						  	<tr>
								<td class="center">{{ $s->sub_code }} </td>
								<td class="center">{{ $s->description }} </td>
								<td class="center">{{ $s->units }} </td>
								
								<td class="center span3">

								{{ Form::open(['route'=>['subjects.destroy', $s->id], 'method'=>'delete', 'style'=>'margin:0;', 'class'=>'ondelete']) }}	

									<a class="btn btn-info" href="{{ route('subjects.edit', [$s->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit Subject">
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

				@include('subjects.create')

			
			</div>

@stop

@section('modals')

	
@stop