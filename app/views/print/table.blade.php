{{ $t_title }}

	<table class="table table-striped table-bordered">
		
		<thead>
			
			<th>Subject Code</th>
			<th>Descriptive Title</th>
			<th>Units</th>
			<th>Grade</th>
			<th>Pre-Requisite(s)</th>

		</thead>

		<tbody>
			
			@foreach (CurrSubj::with('subject', 'pre_requisites')->where('curriculum_id', $student->curriculum_id)->where('year_lvl', $lvl)->where('semester', $sem)->get() as $s)

				<?php $e = Enrollment::where('curriculum_subject_id', $s->id)->where('student_id',$student->id)->first(); ?>
				
				<tr>
					
					<td>{{ $s->subject->sub_code }}</td>
					<td>{{ $s->subject->description }}</td>
					<td>{{ $s->subject->units }}</td>
					<td>{{ $e ? $e->grade : ''  }}</td>
					<td>{{ implode(', ', $s->list_preq()) }}</td>

				</tr>


			@endforeach

		</tbody>

	</table>