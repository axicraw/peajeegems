<?php

use Peajee\Forms\RegistrationForm;
use Peajee\Forms\UpdationForm;

class UsersController extends \BaseController {


	private $registrationForm;
	private $updationForm;
	function __construct(RegistrationForm $registrationForm, UpdationForm $updationForm){
		$this->registrationForm = $registrationForm;
		$this->updationForm = $updationForm;
	}
	// private $updationForm;
	// function __construct(updationForm $updationForm){
	// 	$this->updationForm = $updationForm;
	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Check if admin is logged in 
		if(Auth::check()){
			if((Auth::user()->username) == 'admin'){
				$users = User::where('username', '!=', 'admin')->get();
				return View::make('users.index', ['users'=>$users]);
			}
			return Redirect::intended('/user');
		}
		return Redirect::intended('/');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
		$this->registrationForm->validate($input);
		User::create($input);
		return Redirect::route('users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function user($id)
	{
		//
		$user = User::find($id);
		$docs = $user->docs;
		$posts = $user->posts;
		return View::make('users.user', ['user'=>$user, 'docs'=>$docs, 'posts'=>$posts]) ;
	}
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
		$user = User::find($id);
		return View::make('users.edit', ['user'=>$user]) ;
		

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
		$input = Input::all();
		$this->updationForm->validate($input);
		$user = User::find($id);
		$user->username = $input['username'];
		$user->email = $input['email'];
		$user->password = $input['password'];
		$user->save();
		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		User::find($id)->delete();
		return Redirect::back();
	}

	public function dashboard(){
		
		$user_count = User::count()-1;
		$doc_count = Doc::count();
		return View::make('users.dashboard')
			->with(compact('user_count', 'doc_count'));
			
		
		
	}

}