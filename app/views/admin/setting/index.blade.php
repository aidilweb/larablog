@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Setting</h3>
        <hr>
        <p>
        <ul class="nav nav-pills">
		  <li class="active"><a href="{{ URL::to('admin/setting') }}">Settings</a></li>
		  <li><a href="{{ URL::to('admin/user') }}">Email & Password</a></li>
		</p>
		<br><br>
 		 <!-- notifikasi messages -->
		@if (Session::has('message'))
		    <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		 
		<!-- notifikasi error -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($setting, array('route' => array('admin.setting.update', $setting->id), 'files'=> true, 'enctype' => 'multipart/form-data', 'method' => 'PUT', 'role' => 'form')) }}
		    <div class="form-group">
				{{Form::label('title', 'Blog Title')}}
		        {{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Enter BlogTitle')) }}
		    </div>
			<div class="form-group">
				{{Form::label('slogan', 'Blog Slogan')}}
		        {{ Form::text('slogan', Input::old('slogan'), array('class' => 'form-control', 'placeholder' => 'Enter Blog Slogan')) }}
		    </div>
			<div class="form-group">
				{{Form::label('footer', 'Footer Text')}}
		        {{ Form::text('footer', Input::old('footer'), array('class' => 'form-control', 'placeholder' => 'Enter Footer Text')) }}
		    </div>
			{{Form::submit('Save', array('class' => 'btn btn-primary'))}} 
		{{ Form::close() }}
                
    </div>
</div>
 


@stop