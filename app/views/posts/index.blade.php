@extends('layouts.master')

@section('content')
	<div class="docContainer">
	{{link_to_route('posts.create', 'Compose New Message',null, ['class'=>"btn btn-primary"])}}
	<h3>Sent Messages</h3>
	
	<table class="table">
		<tr>
			<th>Title</th><th>Message</th><th>Delete</th>	
		</tr>
		@foreach($posts as $posts)
			<tr>
				<td>{{$posts->title}}</td><td> {{$posts->body}}</td>
				<td>
				{{Form::open(['method'=>'delete', 'route'=>['posts.destroy',$posts->id]])}}
					{{Form::submit('Delete', $attributes=['class'=>'btn btn-danger btn-xs'])}}
				{{Form::close()}}
				</td>
			</tr>
		@endforeach
	</table>
	 </div>	
@stop