@extends('layouts.master')

@section('content')

	<div class="docContainer">
		<div class="col-md-6">
			<h2 class="title">Create New User</h2>
			{{Form::open(['route'=>'users.store'])}}
				<div class="from-group">
					{{Form::label('username', 'Username:')}}
					{{Form::text('username', null, ['class'=>'form-control', 'required'=>'required'])}}
					{{$errors->first('username', '<span class="error">:message</span>')}}
					<br>
				</div>
				<div class="from-group">
					{{Form::label('email', 'Email:')}}
					{{Form::email('email', null, ['class'=>'form-control', 'required'=>'required'])}}
					{{$errors->first('email', '<span class="error">:message</span>')}}
					<br>
				</div>
				<div class="from-group">
					{{Form::label('password', 'Password:')}}
					{{Form::password('password', ['class'=>'form-control', 'required'=>'required'])}}
					{{$errors->first('password', '<span class="error">:message</span>')}}
					<br>
				</div>
				<div class="from-group">
					{{Form::label('password_confirmation', 'Confirm Password:')}}
					{{Form::password('password_confirmation', ['class'=>'form-control', 'required'=>'required'])}}
					<br>
				</div>
				<div class="from-group">
					<br>
					{{Form::submit('Create User', ['class'=>'btn btn-primary'])}}&nbsp;
					{{link_to_route('users.index', 'Cancel',null, $attributes=['class'=>'btn btn-default'])}}
				</div>
			{{Form::close()}}
		</div>
	</div>
	

@stop