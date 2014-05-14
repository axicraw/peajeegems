<?php

use Peajee\Forms\LoginForm;

class SessionsController extends \BaseController {

	private $LoginForm;
	function __construct(LoginForm $loginForm){
		$this->loginForm = $loginForm;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		//return "this is home";
		return View::make('home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Get the input and validate
		$input = Input::only('username', 'password');
		$this->loginForm->validate($input);

		//Check the login Credintials
		if(Auth::attempt($input)){
			//if admin redirect to admin
			if((Auth::user()->username) == 'admin'){
				return Redirect::intended('/dashboard');
			}
			//else redirect to client
			return Redirect::route('user', Auth::user()->id);

		}
		Session::flash('flash_message', 'Invalid Credintials Provided');
		return Redirect::back()->withInput();
		//return "invalid";

		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		//
		Auth::logout();
		return Redirect::home();
	}

}