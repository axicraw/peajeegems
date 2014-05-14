<?php namespace Peajee\Forms;

use Laracasts\Validation\FormValidator;

class MessageForm extends FormValidator{

	protected $rules = [
		'title'=>'required',
		'body'=>'required',
		'sel_users'=>'required'
	];
}