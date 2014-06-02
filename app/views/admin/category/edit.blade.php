@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Edit </h3>
        <hr>
        <!-- notifikasi error -->
	{{ HTML::ul($errors->all()) }}
	{{ Form::model($category, array('route' => array('admin.category.update', $category->id), 'method' => 'PUT', 'role' => 'form')) }}
	    <div class="form-group">
			{{Form::label('name', 'Name')}}
	        {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}
	    </div>
		{{Form::submit('Save', array('class' => 'btn btn-primary'))}} 
	{{ Form::close() }}

                
    </div>
</div>
 


@stop