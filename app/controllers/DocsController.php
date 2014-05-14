<?php

class DocsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$docs = Doc::all();
		return View::make('docs.index', ['docs'=>$docs]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('docs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$file = Input::file('file'); // your file upload input field in the form should be named 'file'
		$destinationPath = 'public/uploads/';
		$filename = $file->getClientOriginalName();
		$extension = Input::file('file')->getClientOriginalExtension();
		//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
		$uploadSuccess = Input::file('file')->move($destinationPath, $filename);
		$input = array(
			"docname" => $filename,
			"doctype" => $extension,
		);
		$uploaded_file = Doc::create($input);
		// $uploaded_file->docname = $filename;
		// $uploaded_file->doctype = $extension;
		// $uploaded_file->save();

		if( $uploadSuccess ) {
			return Redirect::route('docs.index');
		} else {
		   return Response::json('error', 400);
		}
	}
	public function compose($id){
		$doc = Doc::find($id);
		$users = User::where('username', '!=', 'admin')->get();
		return View::make('docs.select', ['doc'=>$doc, 'users'=>$users]);
	}
	public function send($id){
		$sel_users = Input::get('sel_users');
		foreach ($sel_users as $userid) {
			$user = User::find($userid);
			$user->docs()->attach($id);
		}
		return Redirect::route('docs.index');
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
		
		$file = Doc::find($id);
		$path = 'public/uploads/'.$file->docname;
		File::delete($path);
		$file->delete();
		return Redirect::back();
	}

}