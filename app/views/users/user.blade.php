@extends('layouts.master')

@section('content')
	<h2>Messages</h2>
	<table class="table">
		<tr><th>Title</th><th>Message</th></tr>
		@foreach ($posts as $post)
			<tr><td>{{$post->title}}</td> <td>{{$post->body}}</td></tr>
		@endforeach
		
	</table>
	<h2>Files</h2>
	<table class="table">
		<tr><td>Filename</td><td>Download</td></tr>
		@foreach ($docs as $doc)
			<tr><td>{{$doc->docname}}</td> <td>{{link_to('/uploads/'.$doc->docname, 'download', $attributes=['download', 'class'=>'btn btn-primary btn-sm'])}}</td></tr>
		@endforeach
		
	</table>
	 	
@stop