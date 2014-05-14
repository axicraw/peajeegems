@extends('layouts.master')

@section('content')

	<div class="docContainer">
	<div class="col-md-6">
		<h1 class="title">Welcome to Peejeagems</h1>
		<p class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
	</div>
	<div class="col-md-6">
		<h2>Login</h2>
		{{Form::open(['route'=>'sessions.store'])}}
			@if (Session::has('flash_message'))
				<div class="form-group">
					<p>Error :{{Session::get('flash_message')}}</p>
				</div>
			@endif
			<div class="form-group">
				{{Form::label('username', 'Username:' )}}
				{{Form::text('username',null, ['class' => 'form-control', 'required' => 'required'] )}}
				{{$errors->first('username', '<span class="error">:message</span>')}}
			</div>
			<div class="form-group">
				{{Form::label('password', 'Password:' )}}
				{{Form::password('password', ['class' => 'form-control', 'required' => 'required'] )}}
				{{$errors->first('password', '<span class="error">:message</span>')}}
			</div>
			<div class="form-group">
				<button type="submit" class= 'btn btn-primary'>
				 Login
				</button>
			</div>
		{{Form::close()}}
	</div>
	</div>

@stop