{{ $t_title }}

	<table class="table table-striped table-bordered">
		
		<thead>
			
			<th>Subject Code</th>
			<th>Descriptive Title</th>
			<th>Units</th>

			@if(isset($student))
				<th>Grade</th>
			@endif
			
			@if(!$eval)
				<th>Pre-Requisite(s)</th>
			@endif

		</thead>

		<tbody>
			
			@foreach (CurrSubj::with('subject', 'pre_requisites')->where('curriculum_id', $curriculum_id)->where('year_lvl', $lvl)->where('semester', $sem)->get() as $s)

				@if(isset($student))
					<?php $e = Enrollment::where('curriculum_subject_id', $s->id)->where('student_id',$student->id)->first(); ?>
				@endif
				
				<tr>
					
					<td>{{ $s->subject->sub_code }}</td>
					<td>{{ $s->subject->description }}</td>
					<td>{{ $s->subject->units }}</td>
					
					@if(isset($student))
						<td>{{ $e ? $e->grade : ''  }}</td>
					@endif

					@if(!$eval)
					<td>{{ implode(', ', $s->list_preq()) }}</td>
					@endif

				</tr>

			@endforeach

		</tbody>

	</table>