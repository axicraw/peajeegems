@extends('layouts.master')
@section('header_includes')
{{ HTML::style('/css/basic.css')}}
{{ HTML::style('/css/dropzone.css')}}
{{ HTML::script('/js/dropzone.js')}}
<script>
		  Dropzone.options.myDropzone = {
		    maxFilesize: 500,
		    init: function() {
		      this.on("uploadprogress", function(file, progress) {
		        console.log("File progress", progress);
		      });
		    }
		  }
		  console.log('loaded');
		</script>
@stop
@section('content')
	<h2>Upload Files</h2>
	<p>Drag and Drop files in to the container or click to upload and finaly press finish to complete upload</p>
	 	<div id="dropzone"><form action="{{ url('docs')}}" class="dropzone" id="my-awesome-dropzone"></form></div><br>
	 		
       {{link_to_route('posts.index', 'Finish',null, $attributes=['class'=>'btn btn-primary'])}} 	
        	
           
	<h2>List of Files</h2>
	<table class="table">
		<tr> 
			<th>File Name</th> <th>File type</th> <th>Send File</th><th>Delete</th>
		</tr>
		@foreach($docs as $doc)
			<tr>
				<td>{{$doc->docname}}</td> <td>{{$doc->doctype}}</td>
				<td>
				{{link_to_route('docs.compose', 'Send', $parameters=[$doc->id], $attributes=['class'=>'btn btn-success btn-xs'])}}
				</td>

				<td>
				{{Form::open(['method'=>'delete', 'route'=>['docs.destroy',$doc->id]])}}
					{{Form::submit('Delete', $attributes=['class'=>'btn btn-danger btn-xs'])}}
				{{Form::close()}}
				</td>
			</tr>
		@endforeach
	</table>
	
@stop