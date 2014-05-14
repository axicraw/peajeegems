<?php

class Post extends \Eloquent {
	protected $fillable = ['title', 'body'];
	protected $table = 'posts';

	public function users(){
		return $this->belongsToMany('User');
	} 
}
