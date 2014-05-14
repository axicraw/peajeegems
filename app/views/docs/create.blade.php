@extends('layouts.master')
@section('content')

	<h1>Upload Files</h1>

        <!-- Upload File form -->

        {{Form::open()}}
        	{{Form::file('files[]','Upload', ['multiple'=>'true'])}}
        {{Form::close()}}

        {{HTML::linkRoute('docs.index', 'Finish')}} 
           
       
@stop