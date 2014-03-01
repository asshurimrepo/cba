<?php

class Student extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function course()
	{
		return $this->belongsTo('Course');
	}

	public function fullname()
	{
		return $this->lname.', '.$this->fname.' '.$this->mname;
	}

	public function enrollments()
	{
		return $this->hasMany('Enrollment');
	}

	public function curriculum()
	{
		return $this->belongsTo('Curriculum');
	}
}
