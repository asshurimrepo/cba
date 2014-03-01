<?php

class Enrollment extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function currsubj()
	{
		return $this->belongsTo('CurrSubj', 'curriculum_subject_id');
	}

	public function teacher()
	{
		return $this->belongsTo('Teacher');
	}

	public function student()
	{
		return $this->belongsTo('Student');
	}

	public function subject()
	{
		return $this->belongsTo('Subject');
	}
}
