@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Categories</h3>
        <hr>
        <p>
        <ul class="nav nav-pills">
		  <li><a href="{{ URL::to('admin/post') }}">Post</a></li>
		  <li class="active"><a href="{{ URL::to('admin/category') }}">Category</a></li>
		</p>
		<br><br>
		<h4>New Category</h4>
		<!-- notifikasi error -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => 'admin/category','role' => 'form', 'class'=>'form-inline')) }}
		<div class="form-group">
	    {{ Form::text('name', Input::old('name'), array('class' => 'form-control col-ml-10', 'placeholder' => 'Enter name')) }}
	  	</div>
		{{Form::submit('Add Category', array('class' => 'btn btn-primary'))}} 
		{{ Form::close() }}
		<br>

        <!-- notifikasi messages -->
		@if (Session::has('message'))
		    <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		 
		<table class="table table-striped table-bordered">
		    <thead>
		        <tr>
		            <th class="col-md-1">No</th>
		            <th class="col-md-8">Name</th>
		            <th class="col-md-3">Actions</th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($category as $key => $value)
		        <tr>
		            <td>{{ $value->id }}</td>
		            <td>{{ $value->name }}</td>
		            <td>
		                {{ Form::open(array('url' => 'admin/category/' . $value->id, 'class' => 'pull-right')) }}
		                {{ Form::hidden('_method', 'DELETE') }}
		                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
		                {{ Form::close() }}
		                
		                <!-- edit band GET /bands/{id}/edit -->
		                <a class="btn btn-small btn-info" href="{{ URL::to('admin/category/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-edit"> Edit</a>
		 
		            </td>
		        </tr>
		    @endforeach
		    </tbody>
		</table>
                
    </div>
</div>
<div class="pagination">
    <div class="links">
        {{$category->links()}}
    </div>
    <!-- end links -->
</div> 


@stop