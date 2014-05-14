@extends('layouts.master')

@section('content')
	
	<div class="docContainer"> 
	{{link_to_route('users.create', 'Create New User',null, $attributes=['class'=>'btn btn-primary'])}}
	<h2>List of Users</h2>
	<table class="table">
		<tr>
			<th>Username</th><th>Email</th><th>Edit</th><th>Delete</th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td class="text">{{$user->username}}</td><td> {{$user->email}}</td>
				<td class="butt"> 
				{{link_to_route('users.edit', 'Edit', $parameters=[$user->id], $attributes=['class'=>'btn btn-warning btn-xs'])}}
				</td>
				<td>
				{{Form::open(['method'=>'delete', 'route'=>['users.destroy',$user->id]])}}
					{{Form::submit('Delete', $attributes=['class'=>'btn btn-danger btn-xs'])}}
				{{Form::close()}}
				</td>
			</tr>
		@endforeach
	</table>
	</div>
	

@stop