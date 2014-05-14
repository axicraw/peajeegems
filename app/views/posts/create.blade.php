@extends('layouts.master')

@section('content')

	
	<h2>Create New Message</h2>
	{{Form::open(['route'=>'posts.store'])}}
		<div class="form-group">
			{{Form::label('title', 'Subject:')}}
			{{Form::text('title', null, ['class'=>'form-control', 'required'=>'required'])}}
			{{$errors->first('title', '<span class="error">:message</span>')}}
		</div>
		<div class="form-group">
			{{Form::label('body', 'Message:')}}
			{{Form::textarea('body', null, ['class'=>'form-control', 'required'=>'required'])}}
			{{$errors->first('body', '<span class="error">:message</span>')}}
		</div>
		<div class="form-group">
			{{Form::label('sel_users', 'To:')}}<br>
			<select name="sel_users[]" multiple="true" class="select-group">
		        @foreach ($users as $user) 
		            <option value="{{$user->id}}">{{$user->username;}}</option>
		        @endforeach

	        </select>
	        {{$errors->first('sel_users', '<span class="error">:message</span>')}}
	    </div>
		<div class="form-group">
			<br>

			{{Form::submit('Send Message', ['class'=>'btn btn-primary'])}}
			{{link_to_route('posts.index', 'Cancel',null, $attributes=['class'=>'btn btn-default'])}}
		</div>
	{{Form::close()}}
	
	
	
	 	
@stop