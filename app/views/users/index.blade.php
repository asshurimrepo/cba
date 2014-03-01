@extends('acme')


@section('c')

	<div class="row-fluid sortable">	
				<div class="box span7">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span> Users </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>User Name</th>
								  <th>Access Level</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($users as $row)
						  	<tr>
								<td class="center">{{ $row->name }} </td>
								<td class="center">{{ $row->username }} </td>
								<td class="center">{{ $row->is_admin == 2 ? 'Default Access' : 'Administrator' }} </td>
								
								<td class="center span3">



								{{ Form::open(['route'=>['users.destroy', $row->id], 'method'=>'delete', 'style'=>'margin:0;', 'class'=>'ondelete']) }}	

									<a class="btn btn-info" href="{{ route('users.edit', [$row->id]) }}" data-rel="tooltip" data-placement="top" data-original-title="Edit Subject">
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

				

				@include('users.create')

			
			</div>

@stop

@section('modals')

	
@stop