@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Email & Password</h3>
        <hr>
        <p>
        <ul class="nav nav-pills">
		  <li><a href="{{ URL::to('admin/setting') }}">Settings</a></li>
		  <li class="active"><a href="{{ URL::to('admin/user') }}">Email & Password</a></li>
		</p>
		<br><br>
 		 <!-- notifikasi messages -->
		@if (Session::has('message'))
		    <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		 
		<!-- notifikasi error -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($user, array('route' => array('admin.user.update', $user->id), 'files'=> true, 'enctype' => 'multipart/form-data', 'method' => 'PUT', 'role' => 'form')) }}
		    <div class="form-group">
				{{Form::label('email', 'Email')}}
		        {{Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Enter Email'))}}
		    </div>
			<div class="form-group">
				{{Form::label('password', 'Password')}}
		        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter Password')) }}
		    </div>
			{{Form::submit('Save', array('class' => 'btn btn-primary'))}} 
		{{ Form::close() }}
                
    </div>
</div>
 


@stop