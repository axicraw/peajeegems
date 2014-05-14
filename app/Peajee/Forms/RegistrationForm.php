<?php namespace Peajee\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator{

	protected $rules = [
		'username'=>'required|unique:users',
		'email'=>'required|unique:users',
		'password'=>'required|confirmed'
	];
}