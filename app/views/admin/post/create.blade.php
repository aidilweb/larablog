@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Crate a Post</h3>
        <hr>
        <!-- notifikasi error -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => 'admin/post','role' => 'form', 'files' => true)) }}
		    <div class="form-group">
				{{Form::label('title', 'Title')}}
		        {{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Enter Title')) }}
		    </div>
		    <div class="form-group">
				{{Form::label('content', 'Content')}}
				{{ Form::textarea('content', Input::old('content'), array('class' => 'form-control ckeditor')) }}
		    </div>
			<div class="form-group">
				{{Form::label('category', 'Category')}}
				{{ Form::select('category', Category::all()->lists('name', 'id'), Input::old('category'), array('class' => 'form-control'))}}
		    </div>
			 
			<div class="form-group">
				{{Form::label('picture', 'Picture')}}
				{{ Form::file('picture', array('class' => 'form-control')) }}
		    </div>

			<div class="form-group">
				{{Form::label('status', 'Status')}}
				{{Form::select('status', array('publish' => 'Publish', 'draft' => 'Draft'), Input::old('status'), array('class' => 'form-control')) }}
		    </div>
			
			{{Form::submit('Publish', array('class' => 'btn btn-primary'))}} 
		{{ Form::close() }}
                
    </div>
</div>
 


@stop