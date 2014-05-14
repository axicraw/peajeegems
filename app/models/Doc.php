<?php

class Doc extends \Eloquent {
	protected $fillable = ['docname'];

	public function users(){
		return $this->belongsToMany('User');
	} 
}