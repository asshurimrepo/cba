<?php

class Course extends Eloquent {
	protected $guarded = array();

	public static $rules = array();


	public function curriculums()
	{
		return $this->hasMany('Curriculum');
	}

	public function students()
	{
		return $this->hasMany('Student');
	}
}
