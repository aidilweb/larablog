@extends('layouts.login')

@section('content')
	<div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			  		@if(Session::has('pesan_error'))
			  		<div class="alert alert-danger">{{ Session::get('pesan_error') }}</div>
			  		@endif
			    	{{Form::open(array('action' => 'UserController@authenticate', 'role' => 'form', 'accept-charset' => 'UTF-8')) }}   
                    <fieldset>
			    	  	<div class="form-group">
			    	  		{{Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Addres', 'required' => '', 'autofocus' => ''))}}			    		    
			    		</div>
			    		<div class="form-group">
			    			{{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => ''))}}			    		
			    		</div>
			    		{{Form::submit('Login', array('class' => 'btn btn-lg btn-success btn-block')) }}
			    	</fieldset>
			      	{{Form::close() }}
			    </div>
			</div>
		</div>
	</div>

@stop