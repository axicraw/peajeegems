@extends('layouts.master')

@section('content')
	<h4>Select the users to send  this file [{{$doc->docname}}]</h4>
	{{Form::open(['route'=>['docs.send',$doc->id]])}}
		<select name="sel_users[]" multiple="true" class="select-group">
        @foreach ($users as $user) 
            <option value="{{$user->id}}" class="select-group-item">{{$user->username;}}</option>
        @endforeach
    </select>
    <br><br>
    	{{Form::submit('Send',['class'=>'btn btn-primary'])}}
	{{Form::close()}}
	 	
@stop