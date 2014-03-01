<?php

class Curriculum extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function curriculum_subjects()
	{
		return $this->hasMany('CurrSubj');
	}

	public function course()
	{
		return $this->belongsTo('Course');
	}



	public static function list_subjects($course_id, $not_in = [])
	{
		$curr_subj = [];
		foreach (self::with('curriculum_subjects.subject')->where('id', $course_id)->get() as $c) {
			
			foreach ($c->curriculum_subjects as $s) {
				
				if(!in_array($s->subject_id, $not_in))
				$curr_subj['SY '.$c->sy][$s->id] = $s->subject->sub_code;

			}
			
		}

		return $curr_subj;
	}
}
