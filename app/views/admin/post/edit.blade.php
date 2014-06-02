@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Edit {{$post->title}}</h3>
        <hr>
 
		<!-- notifikasi error -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($post, array('route' => array('admin.post.update', $post->id), 'files'=> true, 'enctype' => 'multipart/form-data', 'method' => 'PUT', 'role' => 'form')) }}
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
				{{ Form::select('category', Category::all()->lists('name', 'id'), Input::old('category', $post->category_id), array('class' => 'form-control'))}}
		    </div>
			<div class="form-group">
				{{Form::label('picture', 'Picture')}}
		        {{ Form::file('picture', Input::old('picture'), array('class' => 'form-control', 'placeholder' => 'Enter Picture')) }}
		    </div>
			<div class="form-group">
				{{Form::label('status', 'Status')}}
				{{Form::select('status', array('publish' => 'Publish', 'draft' => 'Draft'), Input::old('status', $post->status), array('class' => 'form-control')) }}
		    </div>
			{{Form::submit('Save', array('class' => 'btn btn-primary'))}} 
		{{ Form::close() }}
                
    </div>
</div>
 


@stop