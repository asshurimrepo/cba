<?php

class CurrSubj extends Eloquent {
	protected $guarded = array();
	protected $table = 'curriculum_subject';

	public static $rules = array();

	public function curriculum()
	{
		return $this->belongsTo('Curriculum');
	}

	public function subject()
	{
		return $this->belongsTo('Subject');
	}

	public function pre_requisites()
	{
		return $this->hasMany('Prerequisite');
	}

	public function list_preq($f = 'sub_code')
	{
		$preq = [];



		foreach ($this->pre_requisites as $p) {
			if(isset($p->subject))
			$preq[] = $p->subject->$f;
		}

		return $preq;
	}

	public function schedule()
	{
		return $this->days.' '.date('h:i a', strtotime($this->start_time)).' - '.date('h:i a', strtotime($this->end_time));
	}
}
