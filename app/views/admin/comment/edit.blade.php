@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Edit Comment</h3>
        <hr>
        <!-- notifikasi error -->
	{{ HTML::ul($errors->all()) }}
	{{ Form::model($comment, array('route' => array('admin.comment.update', $comment->id), 'method' => 'PUT', 'role' => 'form')) }}
	    <div class="form-group">
			{{Form::label('name', 'Name')}}
	        {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}
	    </div>
		<div class="form-group">
			{{Form::label('content', 'Comment')}}
	        {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control ckeditor', 'placeholder' => 'Enter Name')) }}
	    </div>
		<div class="form-group">
			{{Form::label('status', 'Status')}}
			{{Form::select('status', array('publish' => 'Publish', 'pending' => 'Pending', 'spam' => 'Spam'), Input::old('status', $comment->status), array('class' => 'form-control')) }}
	    </div>
		{{Form::submit('Save', array('class' => 'btn btn-primary'))}} 
	{{ Form::close() }}

                
    </div>
</div>
 


@stop