@extends('acme')


@section('js')
	
	<script type="text/javascript">

	$(document).ready(function(){

		$(".grade_submit").change(function(){
			var id = $(this).data('e_id');
			var grade = $(this).val();
			var o = $(this);

			$.post('{{ url('sumbit-grades') }}',{id:id, grade:grade}, function(){
				o.hide().fadeIn(2000);
				$(".alert").hide().fadeIn(1000).delay(1500).fadeOut(300);
			});

		});

	});

	</script>

@stop


@section('c')

	<div class="alert alert-success" style="display:none"> <b>Grade Successfully Saved!</b> </div>

	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="fa-icon-list-alt"></i><span class="break"></span>{{ $teacher->fullname() }} > Submit Grades > 
						{{ $subject->sub_code }} </h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Student Name </th>
								  <th>Gender </th>
								  <th>Course </th>
								  <th>Grade</th>
							  </tr>
						  </thead> 

						  <tbody>
						  
						  <?php 
						  	$grade_list = [1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 2, 2.3, 2.4, 2.5, 2.6, 2.7, 2.8, 2.9, 3, 'INC', "DRP"];
						  	$grades['0'] = '';
						  	foreach ($grade_list as $g) {
						  		$grades[''.$g] = $g;
						  	}
						  	 
						  ?>

						  	@foreach ($enrollments as $e)
						  		
						  	<tr>
						  		<td>{{ $e->student->fullname() }}</td>
						  		<td>{{ $e->student->gender }}</td>
						  		<td>{{ $e->student->course->code }}</td>
						  		<td class="span3">{{ Form::select('grade', $grades, $e->grade, ['style'=>'width:90%', 'placeholder'=>'Enter Grade Here','class'=>'grade_submit', 'data-e_id'=>$e->id]) }}</td>
						  	</tr>

						  @endforeach  

						  </tbody>
						 
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>

@stop

