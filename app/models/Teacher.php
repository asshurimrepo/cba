<?php

class Teacher extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function fullname()
	{
		return $this->fname.' '.$this->lname;
	}

	public function enrollments()
	{
		return $this->hasMany('Enrollment')->groupBy('subject_id');
	}
}
