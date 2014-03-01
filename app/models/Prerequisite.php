<?php

class Prerequisite extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function subject()
	{
		return $this->belongsTo('Subject');
	}
}
