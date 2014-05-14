<?php

use Peajee\Forms\MessageForm;

class PostsController extends \BaseController {


	private $MessageForm;
	function __construct(MessageForm $messageForm){
		$this->messageForm = $messageForm;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$posts = Post::all();
		return View::make('posts.index', ['posts'=>$posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$users = User::where('username', '!=', 'admin')->get();
		return View::make('posts.create', ['users'=>$users]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::only('title', 'body', 'sel_users');
		$msg = Input::only('title', 'body');
		$sel_users = Input::get('sel_users');
		//$this->messageForm->validate($input);
		$insert = Post::create($msg);
		$id = $insert['id'];
		//return $sel_users;
		foreach ($sel_users as $userid) {
			$user = User::find($userid);
			//return $user->docs();
			$user->posts()->attach($id);
		}
		return Redirect::route('posts.index');

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
	public function destroy($id)
	{
		//
		Post::find($id)->delete();
		return Redirect::back();
	}

}