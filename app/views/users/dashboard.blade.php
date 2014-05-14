@extends('layouts.master')

@section('content')
	
	<h2>Dashboard</h2>
	<div class="col-md-12">
		<h3>Admin Details</h3>
		<ul>
			<li>
				<h4><strong>Username : </strong>{{Auth::user()->username}}</h4>
			</li>
			<li>
				<h4><strong>Email : </strong>{{Auth::user()->email}}</h4>
			</li>
			<li>
				<h4><button class="btn btn-default btn-sm disabled ">{{link_to('home', 'Change Password')}}</h4>
			</li>
		</ul>
	</div>

	<div class="col-md-6">
		<br>
		<h4 >Total no of users : {{$user_count}}</h4>
	</div>

	<div class="col-md-6">
		<br>
		<h4>Total no of files : {{$doc_count}}</h4>
	</div>

	<div class="col-md-6">
		<br>
		<h4>Users activities</h4>
	</div>
	

@stop