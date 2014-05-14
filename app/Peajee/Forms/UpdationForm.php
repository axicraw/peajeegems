<?php namespace Peajee\Forms;

use Laracasts\Validation\FormValidator;
class UpdationForm extends FormValidator {

	protected $rules = [
		'username'=>'required|unique:users,id,{{$id}}',
		'email'=>'required|email|unique:users,id,{{$id}}',
		'password'=>'required|confirmed'
	];
}